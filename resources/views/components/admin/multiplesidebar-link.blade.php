@props(['title', 'active','icons'])

<li class="menu-item menu-item-submenu {{$active ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <i class="menu-icon {{$icons}}"></i>
        <span class="menu-text">{{$title}}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu" kt-hidden-height="80" style="{{$active ? '' : 'display: none; overflow: hidden;'}}">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            {{$slot}}
        </ul>
    </div>
</li>