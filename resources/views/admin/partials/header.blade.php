<div class="header_card">
    <!-- <i class="fas fa-bars" onclick="openNav()"></i> -->
    <i class="fas fa-bars" id="sidebar-toggle"></i>
    <p style="margin: 0px"><i class="fas fa-user"></i>{{ auth()->user() ? auth()->user()->name : '' }}</p>
</div>