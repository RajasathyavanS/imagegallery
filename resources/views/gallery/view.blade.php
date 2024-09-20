<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .gallery-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-title, .gallery-tags {
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
        }

        .gallery-tags {
            margin-top: 10px;
            font-size: 14px;
            font-style: italic;
        }

        .close-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #808080; /* Grey background */
            color: white; /* White text */
            border: none;
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            padding: 10px 15px; /* Padding */
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Transition effects */
            z-index: 9999;
        }

        .close-btn:hover {
            background-color: #606060; /* Darker grey on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
    </style>
</head>
<body>

<div class="gallery-container">
    <h1 class="gallery-title">{{ $images[0]->title }} Gallery</h1>
    <div class="gallery-grid">
        @foreach($images as $image)
        <div class="gallery-item">
            <!-- Linking image to Fancybox gallery -->
            <a href="{{ $image->image_url }}" data-fancybox="gallery" data-caption="{{ $image->title }}">
                <img src="{{ $image->image_url }}" class="card-img-top" alt="{{ $image->title }}">
            </a>
            <!-- <div class="gallery-overlay">
                <h2 class="gallery-title">{{ $image->title }}</h2>
                <p class="gallery-tags">{{ $image->tag }}</p>
            </div> -->
        </div>
        <button class="close-btn" onclick="closeWindow()">X</button>
        @endforeach
    </div>
</div>

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>

<script>
    // Initialize Fancybox for the gallery
    Fancybox.bind("[data-fancybox='gallery']", {
        infinite: true, // Enables previous/next buttons
        keyboard: true, // Allow navigating with keyboard arrows
        buttons: [
            "zoom",
            "slideShow",
            "fullScreen",
            "thumbs",
            "close"
        ]
    });

    function closeWindow() {
        window.location.href = '/'; // This will work if the tab was opened via JavaScript
    }
</script>

</body>
</html>
