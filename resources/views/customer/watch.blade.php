<!DOCTYPE html>
<html>
<head>
    <title>{{ $video->title }}</title>
</head>
<body>

<h2>{{ $video->title }}</h2>

<iframe
    width="700"
    height="400"
    src="{{ str_replace('youtube.com', 'youtube-nocookie.com', $video->video_url) }}"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen>
</iframe>


<br><br>
<a href="/customer/videos">← Kembali ke daftar video</a>

</body>
</html>
