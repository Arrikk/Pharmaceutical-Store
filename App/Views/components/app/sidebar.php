<?php

use App\Helpers\Menu;

$menus = [];
if ($authority == MANAGER) $menus = Menu::manager();
if ($authority == COMPANY) $menus = Menu::company();
if ($authority == ADMINISTRATOR) $menus = Menu::admin();
?>
<div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
    <div class="nk-sidebar-menu" data-simplebar>
        <ul class="nk-menu nk-menu-main">
            <li class="nk-menu-item">
                <a href="html/index.html" class="nk-menu-link">
                    <span class="nk-menu-text">Overview</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-text">Apps</span>
                </a>
                <ul class="nk-menu-sub">
                    <li class="nk-menu-item">
                        <a href="html/apps-messages.html" class="nk-menu-link"><span class="nk-menu-text">Messages</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-inbox.html" class="nk-menu-link"><span class="nk-menu-text">Inbox / Mail</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-file-manager.html" class="nk-menu-link"><span class="nk-menu-text">File Manager</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-chats.html" class="nk-menu-link"><span class="nk-menu-text">Chats / Messenger</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-calendar.html" class="nk-menu-link"><span class="nk-menu-text">Calendar</span><span class="nk-menu-badge">New</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-kanban.html" class="nk-menu-link"><span class="nk-menu-text">Kanban Board</span><span class="nk-menu-badge">New</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="html/components.html" class="nk-menu-link">
                    <span class="nk-menu-text">Components</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="html/support-kb.html" class="nk-menu-link">
                    <span class="nk-menu-text">Support</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="html/pages/contact.html" class="nk-menu-link">
                    <span class="nk-menu-text">Contact</span>
                </a>
            </li><!-- .nk-menu-item -->
        </ul><!-- .nk-menu -->
        <ul class="nk-menu">
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">Dashboard</h6>
            </li><!-- .nk-menu-heading -->

            <?php foreach ($menus as $menu => $value) : ?>
                <li class="nk-menu-item">
                    <a href="<?= $value['link'] ?>" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="<?= $value['icon'] ?>"></em></span>
                        <span class="nk-menu-text"><?= $menu ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <!-- .nk-menu-item -->
        </ul><!-- .nk-menu -->
    </div><!-- .nk-sidebar-menu -->
    <div class="nk-aside-close">
        <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
    </div><!-- .nk-aside-close -->
</div><!-- .nk-aside -->