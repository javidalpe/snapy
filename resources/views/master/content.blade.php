@include('master.tabbar')
<div id="content" class="ui container">
  @include('master.alerts')
  @include('master.validation')
  @yield('content')
  @include('master.footer')
</div>
