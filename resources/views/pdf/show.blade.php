<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Laravel</title>
      <meta name="apple-mobile-web-app-capable" content="yes">

      <link rel="stylesheet" href="{{secure_asset('reader/css/normalize.css')}}">
      <link rel="stylesheet" href="{{secure_asset('reader/css/main.css')}}">
      <link rel="stylesheet" href="{{secure_asset('reader/css/popup.css')}}">

      <script src="{{secure_asset('reader/js/libs/jquery.min.js')}}"></script>

      <script src="{{secure_asset('reader/js/libs/zip.min.js')}}"></script>

      <script>
            "use strict";

            document.onreadystatechange = function() {
                  if (document.readyState == "complete") {
                        const pdf = @json($pdf);
                        /*
                        window.reader = ePubReader("https://store-epub.s3.sa-east-1.amazonaws.com/uploads/biRSFVf7ryKX2PtAFmmQmyS5Kaen33TIkepFa1IH.epub ", {
                              restore: true,
                              
                        });
                        */
                        let url = "https://store-epub.s3.sa-east-1.amazonaws.com/"+pdf.pdf
                        fetch(url)
                        .then(res => res.blob())
                        .then(blob => {
                              const Book = ePubReader(blob, {
                              restore: true,
                              replacements: 'blobUrl',
                              
                              
                        });
                        })
                        //console.log(pdf)
                  }
            };
      </script>

      <!-- File Storage -->
      <!-- <script src="js/libs/localforage.min.js"></script> -->

      <!-- Full Screen -->
      <script src="{{secure_asset('reader/js/libs/screenfull.min.js')}}"></script>

      <!-- Render -->
      <script src="{{secure_asset('reader/js/epub.js')}}"></script>

      <!-- Reader -->
      <script src="{{secure_asset('reader/js/reader.js')}}"></script>

      <!-- Plugins -->
      <!-- <script src="js/plugins/search.js"></script> -->

      <!-- Highlights -->
      <!-- <script src="js/libs/jquery.highlight.js"></script> -->
      <!-- <script src="js/hooks/extensions/highlight.js"></script> -->

</head>

<body>
      <div id="sidebar">
            <div id="panels">
                  <!-- <input id="searchBox" placeholder="search" type="search"> -->

                  <!-- <a id="show-Search" class="show_view icon-search" data-view="Search">Search</a> -->
                  <a id="show-Toc" class="show_view icon-list-1 active" data-view="Toc">TOC</a>
                  <a id="show-Bookmarks" class="show_view icon-bookmark" data-view="Bookmarks">Bookmarks</a>
                  <!-- <a id="show-Notes" class="show_view icon-edit" data-view="Notes">Notes</a> -->

            </div>
            <div id="tocView" class="view">
            </div>
            <div id="searchView" class="view">
                  <ul id="searchResults"></ul>
            </div>
            <div id="bookmarksView" class="view">
                  <ul id="bookmarks"></ul>
            </div>
            <div id="notesView" class="view">
                  <div id="new-note">
                        <textarea id="note-text"></textarea>
                        <button id="note-anchor">Anchor</button>
                  </div>
                  <ol id="notes"></ol>
            </div>
      </div>
      <div id="main">

            <div id="titlebar">
                  <div id="opener">
                        <a id="slider" class="icon-menu">Menu</a>
                  </div>
                  <div id="metainfo">
                        <span id="book-title"></span>
                        <span id="title-seperator">&nbsp;&nbsp;–&nbsp;&nbsp;</span>
                        <span id="chapter-title"></span>
                  </div>
                  <div id="title-controls">
                        <a id="bookmark" class="icon-bookmark-empty">Bookmark</a>
                        <a id="setting" class="icon-cog">Settings</a>
                        <a id="fullscreen" class="icon-resize-full">Fullscreen</a>
                  </div>
            </div>

            <div id="divider"></div>
            <div id="prev" class="arrow">‹</div>
            <div id="viewer"></div>
            <div id="next" class="arrow">›</div>

            <div id="loader"><img src="{{secure_asset('img/loader.gif')}}"></div>
      </div>
      <div class="modal md-effect-1" id="settings-modal">
            <div class="md-content">
                  <h3>Settings</h3>
                  <div>
                        <p>
                              <input type="checkbox" id="sidebarReflow" name="sidebarReflow">Reflow text when sidebars are open.
                        </p>
                  </div>
                  <div class="closer icon-cancel-circled"></div>
            </div>
      </div>
      <div class="overlay"></div>
</body>

</html>