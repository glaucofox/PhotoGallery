<div class="ui attached stackable menu">
  <div class="ui container">
  <a class="item" href="#" style="font-size: 1.3em"><i class="photo icon"></i> PhotoGallery</p>
    <a class="item
    @if(Request::path() == '/' || Request::path() === 'albums')
        active
    @endif 
    " href="/">
      <i class="home icon"></i> Home
    </a>
    <a class="item 
    @if(Request::path() == 'albums/create')
        active
    @endif
    " href="/albums/create">
      <i class="grid layout icon"></i> Create Album
    </a>
    
    <div class="right item">
    
    </div>
  </div>
</div>