@php
    $isMobile = (new Jenssegers\Agent\Agent())->isMobile();
    $isDesktop = (new Jenssegers\Agent\Agent())->isDesktop();
@endphp

    @if($isDesktop)
        @include('pordfolio::content.desk.hero')
    @else
        @include('pordfolio::content.mob.hero')
    @endif

<style>
    .profile-image-section{
        float: right;
    }
</style>
