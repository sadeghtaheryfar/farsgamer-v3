@props(['active','icons', 'icon' => 'flaticon-home'])

<li class="menu-item {{$active ? 'menu-item-active' : ''}}" aria-haspopup="true">
    <a {!! $attributes->merge(['class'=> 'menu-link']) !!}>
        <i class="menu-icon {{$icons}}"><span></span></i>
        <span class="menu-text">{{$slot}}</span>
    </a>
</li>
