@php
    use App\Enums\RoleEnum;
@endphp
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}"
                            alt="img"><span> Dashboard</span> </a>
                </li>
                @if (Auth::user()->role_id == RoleEnum::COMPANY)
                    <li class="">
                        <a href="{{ route('categories') }}"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span> catégories</span><span class="menu-arrow"></span></a>
                        {{-- <ul>
                            <li><a href="{{ route('categories') }}">liste des categories </a></li>
                        </ul> --}}

                    </li>

                    <li class="">
                        <a  href="{{ route('products') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> produits</span>
                            <span class="menu-arrow"></span></a>

                    </li>
                    <li class="submenu">
                        <a><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> commandes</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('admin-commande') }}">liste des commandes </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> depenses</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('depenses') }}">liste des depense </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> Entrées</span>
                            <span class="menu-arrow"></span></a>

                    </li>
                    <li class="submenu">
                        <a><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> sorties</span>
                            <span class="menu-arrow"></span></a>

                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span> rapport</span> <span class="menu-arrow"></span></a>

                    </li>
                @endif

                    @if (Auth::user()->role_id == RoleEnum::ADMIN)
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span> personnel</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('users') }}">liste du personnel </a></li>
                        </ul>
                    </li>
                @endif

                <li class="text-white bg-warning">
                    <a href=""><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span>
                            rentrer à l'acceuil</span> </a>
                </li>




            </ul>
        </div>
    </div>
</div>
