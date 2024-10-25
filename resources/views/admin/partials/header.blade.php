<div class="header_card">
    <i class="fas fa-bars" onclick="openNav()"></i>
    <p style="margin: 0px"><i class="fas fa-user"></i>{{ auth()->user() ? auth()->user()->name : '' }}</p>
</div>
<script>
    function openNav() {
        document.getElementById("side-nav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("side-nav").style.width = "0";
    }
</script>