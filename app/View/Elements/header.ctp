
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php echo $this->Html->link(Configure::read('Application.name'), "/", array('class' => 'brand')) ?>
            <div class="nav-collapse">
                <ul class="nav">
                    <?php if (AuthComponent::user('id')): ?>                        
                        <li class="<?php echo $this->action == 'tracks' ? 'active' : ''; ?>">
                            <?php echo $this->Html->link('Músicas', array('controller' => 'tracks', 'action' => 'index')) ?>
                        </li>
                        <li class="<?php echo $this->action == 'artists' ? 'active' : ''; ?>">
                            <?php echo $this->Html->link('Artistas', array('controller' => 'artists', 'action' => 'index')) ?>
                        </li>
                        <li class="<?php echo $this->action == 'genres' ? 'active' : ''; ?>">
                            <?php echo $this->Html->link('Gêneros', array('controller' => 'genres', 'action' => 'index')) ?>
                        </li>
                        <li class="<?php echo $this->action == 'labels' ? 'active' : ''; ?>">
                            <?php echo $this->Html->link('Gravadoras', array('controller' => 'labels', 'action' => 'index')) ?>
                        </li>
                    <?php else: ?>
                        <li class="<?php echo $this->action == 'register' ? 'active' : ''; ?>">
                            <?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'register')) ?>
                        </li>                       
                    <?php endif ?>                    
                </ul>

                <?php if (AuthComponent::user('id')): ?>
                    

                    <ul class="nav pull-right">
                        <li id="fat-menu" class="dropdown">
                            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-black icon-user"></i> 
                                <?php echo AuthComponent::user('username') ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="icon-black icon-heart"></i> Fav Tracks', '/tracks/favorites', array(
                                        'tabindex' => '-1',
                                        'escape' => false
                                        )
                                    )
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="icon-black icon-heart"></i> Fav Labels', '/labels/favorites', array(
                                        'tabindex' => '-1',
                                        'escape' => false
                                        )
                                    )
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="icon-black icon-off"></i> Logout', '/users/logout', array(
                                        'tabindex' => '-1',
                                        'escape' => false
                                        )
                                    )
                                    ?>
                                </li>
                            </ul>
                        </li>
                    </ul>   

                    <?php echo $this->element('player') ?>
                <?php endif ?>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>