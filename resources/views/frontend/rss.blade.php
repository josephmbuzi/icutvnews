<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0">
    <channel>
        <title>Your Blog Title</title>
        <link>{{ url('/') }}</link>
        <description>Your Blog Description</description>
        <language>en-us</language>

        @foreach($blogs as $blog)
            <item>
                <title>{{ $blog->blog_title }}</title>
                <link>{{ url('blog/details' . $blog->id) }}</link>
                <description>{{ $blog->blog_description }}</description>
                <pubDate>{{ $blog->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
