<nav id="column-left">
    <div id="profile">
        <div>
            <h4>Hi, <?php echo $this->session->userdata('user') ?></h4>
        </div>
    </div>
    <ul id="menu">
        <li id="dashboard"><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span></a></li>
        <li id="home"><a class="parent"><i class="fa fa-home fa-fw"></i> <span>Home</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/home/video') ?>">Video</a></li>
                <li><a href="<?php echo base_url('admin/home/slideshow') ?>">Slideshow</a></li>
                <li><a href="<?php echo base_url('admin/home/content_element') ?>">Content element</a></li>
                <!-- <li><a href="<?php echo base_url('admin/home/service') ?>">Service</a></li> -->
            </ul>
        </li>
        <li id="project"><a class="parent"><i class="fa fa-briefcase fa-fw"></i> <span>Project</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/project/slideshow') ?>">Slideshow</a></li>
                <li><a href="<?php echo base_url('admin/project/category') ?>">Category</a></li>
                <li><a href="<?php echo base_url('admin/project/project') ?>">Project</a></li>
            </ul>
        </li>
        <li id="client"><a class="parent"><i class="fa fa-users fa-fw"></i> <span>Client</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/client/icon') ?>">Icon</a></li>
                <li><a href="<?php echo base_url('admin/client/lists') ?>">List</a></li>
            </ul>
        </li>
        <li id="about"><a class="parent"><i class="fa fa-book fa-fw"></i> <span>About</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/about/our_team') ?>">Our team</a></li>
                <li><a href="<?php echo base_url('admin/about/intro') ?>">Intro</a></li>
                <li><a href="<?php echo base_url('admin/about/people') ?>">People</a></li>
            </ul>
        </li>
        <li id="contact"><a class="parent"><i class="fa fa-phone fa-fw"></i> <span>Contact</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/contact/intro') ?>">Contact</a></li>
                <li><a href="<?php echo base_url('admin/contact/inbox') ?>">Inbox</a></li>
            </ul>
        </li>
        <li id="menu"><a href="<?php echo base_url('admin/menu') ?>"><i class="fa fa-list fa-fw"></i> <span>Menu</span></a></li>
        <li id="user"><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-user fa-fw"></i> <span>User</span></a></li>
        <li id="setting"><a href="<?php echo base_url('admin/setting') ?>"><i class="fa fa-cog fa-fw"></i> <span>Setting</span></a></li>
    </ul>
</nav>