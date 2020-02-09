<nav id="column-left">
    <div id="profile">
        <div>
            <h4>Hi, <?php echo word_limiter($data_member['name'],1); ?></h4>
        </div>
    </div>
    <ul id="menu">
        <li id="dashboard"><a href="<?php echo base_url('member/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span></a></li>
        <li id="member"><a class="parent"><i class="fa fa-user fa-fw"></i> <span>Profile</span></a>
            <ul>
                <li><a href="<?php echo base_url('member/profile') ?>">Update Profile</a></li>
                <li><a href="<?php echo base_url('member/profile/edit_password') ?>">Update Password</a></li>
            </ul>
        </li>
    </ul>
</nav>