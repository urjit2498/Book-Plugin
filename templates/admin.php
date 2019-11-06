<div class="wrap">
    <h1>Book Plugin</h1>
    <?php settings_errors(); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Updates</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form method="post" action="options.php">
                <?php
            		settings_fields('book_options_group');
            		do_settings_sections('book_plugin');
            		submit_button();
        		?>
            </form>
        </div>

        <div id="tab-2" class="tab-pane ">
            <h3>Updates</h3>
        </div>

        <div id="tab-3" class="tab-pane ">
            <h3>About</h3>
        </div>
    </div>
</div>

<script>
window.addEventListener("load", function() {
    //store tabs variables
    var tabs = document.querySelectorAll("ul.nav-tabs > li");

    for (i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", switchTab);
    }

    function switchTab(event) {
        event.preventDefault();

        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        var clickedTab = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.getAttribute("href");

        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");

    }
});
</script>