<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Support\SiteDataStore;

class RoomController extends Controller
{
    private function defaults(): array
    {
        return [
            ['title' => '3 Room Portion (Mountain View)', 'description' => 'A spacious 3-bedroom portion with a cozy TV lounge and dining area, opening onto a private balcony with breathtaking mountain views.', 'price' => '35,000', 'rating' => '5.0', 'bedrooms' => '3', 'persons' => '6', 'features' => ['TV Lounge', 'Dining Area', 'Balcony with Mountain View'], 'images' => ['images/mountain-view-one.webp', 'images/mountain-view-two.webp', 'images/mountain-view-five.webp', 'images/mountain-view-six.webp', 'images/bedroom-balcony-Cradtk-four.webp']],
            ['title' => '3 Room Portion (Lawn Access)', 'description' => 'Perfect for families and groups, this 3-bedroom portion features a TV lounge, dining area and direct access to a private lawn.', 'price' => '35,000', 'rating' => '', 'bedrooms' => '3', 'persons' => '', 'features' => ['TV Lounge', 'Dining Area', 'Balcony with Mountain View'], 'images' => ['images/lawn-access-one.webp', 'images/lawn-access-two.webp', 'images/lawn-access-three.webp', 'images/lawn-access-four.webp', 'images/lawn-access-five.webp']],
            ['title' => '2 Rooms Suite', 'description' => 'A comfortable 2-bedroom suite with its own kitchen, TV lounge, dining area and a huge balcony to relax and enjoy the view.', 'price' => '35,000', 'rating' => '', 'bedrooms' => '2', 'persons' => '', 'features' => ['Kitchen Available', 'TV Lounge', 'Dining Area', 'Balcony with Mountain View'], 'images' => ['images/suite-three.webp', 'images/mountain-view-one.webp', 'images/mountain-view-two.webp', 'images/mountain-view-five.webp']],
        ];
    }

    public function rooms(): array
    {
        $saved = SiteDataStore::get('rooms', null);
        return is_array($saved) ? $saved : $this->defaults();
    }

    public function index()
    {
        return view('rooms', ['rooms' => $this->rooms()]);
    }

    public function admin(Request $request)
    {
        $rooms = $this->rooms();
        $index = (int) $request->query('edit', -1);
        $editingRoom = array_key_exists($index, $rooms) ? $rooms[$index] : null;

        return view('admin.rooms', compact('rooms', 'editingRoom', 'index'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:700'],
            'price' => ['required', 'string', 'max:30'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:5'],
            'bedrooms' => ['required', 'integer', 'min:1', 'max:20'],
            'persons' => ['required', 'integer', 'min:1', 'max:50'],
            'features' => ['nullable', 'string', 'max:1000'],
            'feature_choices' => ['nullable', 'array'],
            'feature_choices.*' => ['string', 'max:80'],
            'kitchen' => ['required', 'in:yes,no'],
            'room_index' => ['nullable', 'integer', 'min:0'],
            'images' => ['nullable', 'array', 'min:1', 'max:8'],
            'images.*' => ['file', 'mimes:jpg,jpeg,png,webp', 'max:20480'],
        ]);

        $rooms = $this->rooms();
        $editing = isset($data['room_index']) && array_key_exists($data['room_index'], $rooms);
        if (!$editing && !$request->hasFile('images')) {
            return back()->withErrors(['images' => 'Please upload at least one room image.'])->withInput();
        }
        $images = $editing ? $rooms[$data['room_index']]['images'] : [];
        if ($request->hasFile('images')) {
            $directory = public_path('images/rooms');
            File::ensureDirectoryExists($directory);
            if (count($images) + count($request->file('images')) > 8) {
                return back()->withErrors(['images' => 'A room can have a maximum of 8 images. Remove an existing image first.'])->withInput();
            }
            foreach ($request->file('images') as $image) {
                $filename = basename($image->getClientOriginalName());
                $image->move($directory, $filename);
                $images[] = 'images/rooms/' . $filename;
            }
        }
        $typedFeatures = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $data['features'] ?? ''))));
        $features = array_values(array_filter(array_unique(array_merge($data['feature_choices'] ?? [], $typedFeatures)), function ($feature) {
            return !in_array(strtolower(trim($feature)), ['kitchen', 'kitchen available', 'no kitchen']);
        }));
        $room = ['title' => $data['title'], 'description' => $data['description'], 'price' => $data['price'], 'rating' => $data['rating'] ?? '', 'bedrooms' => $data['bedrooms'], 'persons' => $data['persons'], 'kitchen' => $data['kitchen'], 'features' => $features, 'images' => $images];
        if ($editing) { $rooms[$data['room_index']] = $room; $savedIndex = (int) $data['room_index']; } else { $rooms[] = $room; $savedIndex = count($rooms) - 1; }
        SiteDataStore::put('rooms', $rooms);

        return redirect()->route('admin.rooms', ['edit' => $savedIndex])->with('success', $editing ? 'Room updated successfully. New images are shown below.' : 'Room added successfully and is now live on the Rooms page.');
    }

    public function destroy($room)
    {
        $rooms = $this->rooms();
        if (!array_key_exists((int) $room, $rooms)) {
            return redirect()->route('admin.rooms')->withErrors(['room' => 'This room no longer exists.']);
        }

        array_splice($rooms, (int) $room, 1);
        SiteDataStore::put('rooms', $rooms);

        return redirect()->route('admin.rooms')->with('success', 'Room deleted successfully.');
    }

    public function replaceImage(Request $request, $room, $image)
    {
        $rooms = $this->rooms();
        if (!isset($rooms[$room]['images'][$image])) return back()->withErrors(['image' => 'Image not found.']);
        $request->validate(['image' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:20480']]);
        $directory = public_path('images/rooms'); File::ensureDirectoryExists($directory);
        $filename = basename($request->file('image')->getClientOriginalName());
        $request->file('image')->move($directory, $filename);
        $rooms[$room]['images'][$image] = 'images/rooms/' . $filename;
        SiteDataStore::put('rooms', $rooms);
        if ($request->expectsJson()) return response()->json(['success' => true, 'image' => asset($rooms[$room]['images'][$image]), 'filename' => basename($rooms[$room]['images'][$image])]);
        return back()->with('success', 'Image replaced successfully.');
    }

    public function deleteImage(Request $request, $room, $image)
    {
        $rooms = $this->rooms();
        $imageName = $request->input('image_name');
        if ($imageName && isset($rooms[$room]['images'])) {
            foreach ($rooms[$room]['images'] as $currentIndex => $path) {
                if (basename($path) === $imageName) { $image = $currentIndex; break; }
            }
        }
        if (!isset($rooms[$room]['images'][$image])) {
            if (request()->expectsJson()) return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
            return back()->withErrors(['image' => 'Image not found.']);
        }
        array_splice($rooms[$room]['images'], (int) $image, 1);
        SiteDataStore::put('rooms', $rooms);
        if (request()->expectsJson()) return response()->json(['success' => true, 'fallback' => false]);
        return back()->with('success', 'Image deleted successfully.');
    }
}
