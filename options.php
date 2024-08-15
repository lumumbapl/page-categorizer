<?php
// Add admin menu
function pc_add_admin_menu() {
    add_menu_page(
        'Page Categorizer Settings',
        'Page Categorizer',
        'manage_options',
        'page-categorizer-settings',
        'pc_options_page',
        'dashicons-category',
        30
    );
}
add_action('admin_menu', 'pc_add_admin_menu');

// Create the options page
function pc_options_page() {
    ?>
    <div class="wrap pc-admin-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div class="pc-admin-content">
            <div class="pc-main-content">
                <div class="pc-welcome-panel">
                    <h2>Welcome to Page Categorizer</h2>
                    <p>All the essential category and tag features you need for your pages in one plugin! Page Categorizer comes with options to customize your page categorization.</p>
                    <div class="pc-video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/HgE0-TjobS8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Add your settings form here -->
            </div>
            <div class="pc-sidebar">
                <div class="pc-sidebar-box">
                    <h3>Documentation</h3>
                    <p>Find detailed documentation and usage instructions for all Page Categorizer features.</p>
                    <a href="#" class="button button-primary">Visit Documents</a>
                </div>
                <div class="pc-sidebar-box">
                    <h3>Support</h3>
                    <p>Need help or have questions? Our support team is here to assist you.</p>
                    <a href="#" class="button button-secondary">Support Forum</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
