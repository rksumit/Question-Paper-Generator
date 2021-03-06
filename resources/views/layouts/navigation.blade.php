<ul>
    <li class="nav-item @if (request()->routeIs('home')) active @endif">
        <a href="{{ route('home') }}">
            <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                    <path
                        d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                </svg>
            </span>
            <span class="text">{{ __('Dashboard') }}</span>
        </a>
    </li>
    @can('viewAny', App\models\User::class)
    <li class="nav-item @if (request()->routeIs('users.index')) active @endif">
        <a href="{{ route('users.index') }}">
            <span class="icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </span>
            <span class="text">{{ __('Users') }}</span>
        </a>
    </li>
    @endcan

    @can('viewAny', App\models\Teacher::class)
    <li class="nav-item {{ (request()->is('teachers*')) ? 'active' : '' }}">
        <a href="{{ route('teachers.index') }}"> Teachers </a>
    </li>
    @endcan

    <li class="nav-item {{ (request()->is('subjects*')) ? 'active' : '' }}">
        <a href="{{ route('subjects.index') }}"> Subjects </a>
    </li>
    <li class="nav-item {{ (request()->is('topics*')) ? 'active' : '' }}">
        <a href="{{ route('topics.index') }}"> Topics </a>
    </li>
{{--    <li class="nav-item {{ (request()->is('questions/*')) || (request()->is('questions')) ? 'active' : '' }}">--}}
{{--        <a href="{{ route('questions.index') }}"> Questions </a>--}}
{{--    </li>--}}
    <li class="nav-item {{ (request()->is('questionset*')) ? 'active' : '' }}">
        <a href="{{ route('questionset.index') }}"> Question Sets </a>
    </li>
    {{-- <li class="nav-item @if (request()->routeIs('users.index')) active @endif">
        <a href="AddQuestion"> Teacher </a>
    </li> --}}
</ul>
