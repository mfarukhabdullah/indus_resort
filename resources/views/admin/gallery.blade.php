<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gallery | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <style>
        .gallery-editor { max-width: 1050px; padding: 24px; }
        .upload-box { display: block; border: 2px dashed #8fb5a7; background: #f3faf6; border-radius: 9px; padding: 28px; text-align: center; color: #176044; font-weight: 700; cursor: pointer; }
        .upload-box input { display: none; }
        .gallery-preview { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 12px; margin-top: 20px; }
        .gallery-preview img { width: 100%; height: 130px; object-fit: cover; border-radius: 7px; }
        .gallery-card { border: 1px solid #e1e7e4; border-radius: 8px; padding: 6px; }
        .gallery-card div { display: flex; gap: 6px; margin-top: 7px; }
        .mini-btn { border: 1px solid #bcd9cc; background: #fff; color: #0b6e48; border-radius: 5px; padding: 5px 7px; font-size: 10px; cursor: pointer; }
        .mini-btn.delete { border-color: #f0b6b6; color: #a42531; }
        .save { margin-top: 16px; border: 0; border-radius: 7px; background: #176044; color: white; padding: 11px 16px; font-weight: 700; cursor: pointer; }
        .notice { padding: 10px; background: #eaf6ef; color: #0b6e48; border-radius: 7px; }
    </style>
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar')

    <main class="content">
        @include('admin.partials.topbar', ['hideSearch' => true])

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>Gallery</h1>
            <p>Add as many gallery images as you want. Your public gallery design stays the same.</p>
        </div>

        <section class="panel gallery-editor">
            @if(session('success'))
                <p class="notice">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                @csrf
                <label class="upload-box">
                    <i class="ri-image-add-line" style="font-size:28px"></i><br>
                    Add Gallery Pictures
                    <input type="file" id="galleryImages" name="images[]" accept="image/jpeg,image/png,image/webp" multiple required>
                    <small style="display:block;margin-top:7px;color:#70807d">Select any number of JPG, JPEG, PNG or WEBP images</small>
                </label>
                <div id="selectedGalleryPreview" class="gallery-preview" style="display:none"></div>
                <button class="save" type="submit"><i class="ri-upload-2-line"></i> Upload Pictures</button>
            </form>

            <div class="gallery-preview">
                @foreach($galleryImages as $index => $image)
                    <div class="gallery-card">
                        <img src="{{ asset($image['path']) }}" alt="Gallery image">
                        <div>
                            <form method="POST" action="{{ route('admin.gallery.replace', $index) }}" enctype="multipart/form-data" style="display:inline">
                                @csrf
                                <input type="file" name="image" accept="image/jpeg,image/png,image/webp" required onchange="this.form.submit()" style="display:none" id="replace{{ $index }}">
                                <label for="replace{{ $index }}" class="mini-btn">Replace</label>
                            </form>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $index) }}" style="display:inline" onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button class="mini-btn delete" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebarClose = document.querySelector('.sidebar-close');
    if (menuToggle && sidebar) menuToggle.onclick = () => sidebar.classList.add('open');
    if (sidebarClose && sidebar) sidebarClose.onclick = () => sidebar.classList.remove('open');

    document.getElementById("galleryImages").addEventListener("change", function(){
        const box = document.getElementById("selectedGalleryPreview");
        box.innerHTML = "";
        box.style.display = this.files.length ? "grid" : "none";
        Array.from(this.files).forEach(file => {
            const card = document.createElement("div");
            card.className = "gallery-card";
            const image = document.createElement("img");
            image.src = URL.createObjectURL(file);
            image.alt = "Selected gallery picture";
            card.appendChild(image);
            box.appendChild(card);
        });
    });
</script>
</body>
</html>
