<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Active::checkUriPattern('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-title">
                @lang('menus.backend.title.customer')
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon far fa-user"></i>
                    @lang('menus.backend.customer.title')

                    @if ($pending_approval > 0)
                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                    @endif
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/customer*'))
                        }}" href="{{ route('admin.customer.index') }}">
                            @lang('labels.backend.customer.management')

                            @if ($pending_approval > 0)
                                <span class="badge badge-danger">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-title">
                @lang('menus.backend.title.apartment')
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon far fa-user"></i>
                    @lang('menus.backend.apartment.title')

                    @if ($pending_approval > 0)
                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                    @endif
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/apartment*'))
                        }}" href="{{ route('admin.apartment.index') }}">
                            @lang('labels.backend.apartment.management')

                            @if ($pending_approval > 0)
                                <span class="badge badge-danger">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/room/*'))
                        }}" href="{{ route('admin.room.index') }}">
                            @lang('labels.backend.room.management')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-title">
                @lang('menus.backend.title.location')
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon far fa-user"></i>
                    @lang('menus.backend.title.location')

                    @if ($pending_approval > 0)
                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                    @endif
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/country*'))
                        }}" href="{{ route('admin.country.index') }}">
                            @lang('labels.backend.country.management')

                            @if ($pending_approval > 0)
                                <span class="badge badge-danger">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{--}}
{{--                            active_class(Active::checkUriPattern('admin/city/*'))--}}
{{--                        }}" href="{{ route('admin.city.index') }}">--}}
{{--                            @lang('labels.backend.city.management')--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{--}}
{{--                            active_class(Active::checkUriPattern('admin/district/*'))--}}
{{--                        }}" href="{{ route('admin.district.index') }}">--}}
{{--                            @lang('labels.backend.district.management')--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{--}}
{{--                            active_class(Active::checkUriPattern('admin/commune/*'))--}}
{{--                        }}" href="{{ route('admin.commune.index') }}">--}}
{{--                            @lang('labels.backend.commune.management')--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>

        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
