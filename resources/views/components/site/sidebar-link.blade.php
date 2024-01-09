@props(['active', 'icon' , 'arrow' => ''])

<li>
    <a {!! $attributes->class(['nav-menu-item', 'nav-menu-item--active' => $active]) !!}>
        <i class="nav-menu-item__icon {{$icon}}"></i>
        <span class="nav-menu-item__title">{{$slot}}</span>
		{!! $arrow == true ? '<i class="menu_proucts_arrow"></i>' : ''  !!}
    </a>
</li> 
 