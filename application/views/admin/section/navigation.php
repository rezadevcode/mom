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
                <li><a href="<?php echo base_url('admin/home/sponsor') ?>">Sponsore</a></li>
                <li><a href="<?php echo base_url('admin/home/slideshow') ?>">Slideshow</a></li>
                <li><a href="<?php echo base_url('admin/home/service') ?>">Our Service</a></li>
            </ul>
        </li>
        <li id="home"><a class="parent"><i class="fa fa-list fa-fw"></i> <span>About</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/about/video') ?>">Video</a></li>
                <li><a href="<?php echo base_url('admin/about/our_team') ?>">Our team</a></li>
                <li><a href="<?php echo base_url('admin/about/milestone') ?>">Milestone</a></li>
            </ul>
        </li>
        <li id="home"><a class="parent"><i class="fa fa-list fa-fw"></i> <span>Mom Academy</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/program') ?>">Program</a></li>
            </ul>
        </li>
        <li id="home"><a class="parent"><i class="fa fa-list fa-fw"></i> <span>Mom Project</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/project') ?>">Project</a></li>
            </ul>
        </li>
        <li id="menu"><a href="<?php echo base_url('admin/home/banner') ?>"><i class="fa fa-list fa-fw"></i> <span>Banner</span></a></li>
        <li id="menu"><a href="<?php echo base_url('admin/content_element') ?>"><i class="fa fa-list fa-fw"></i> <span>Content element</span></a></li>        
        <li id="member"><a class="parent"><i class="fa fa-user fa-fw"></i> <span>Member</span></a>
            <ul>
                <li><a href="<?php echo base_url('admin/member') ?>">Member data</a></li>
                <li><a href="<?php echo base_url('admin/service') ?>">Member service</a></li>
            </ul>
        </li>
    </ul>
</nav>