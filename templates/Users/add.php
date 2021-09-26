<?php
echo $this -> Html->css("login.css",['block'=>true]);
?>

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Create an Account</h3>
                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create($user,['novalidate' => true]) ?>
                                    <div class="form-label-group">
                                        <?= $this->Form->control('email', [
                                            'placeholder'=>'Email address',
                                            'label'=> false,
                                            'class'=>'form-control',
                                            'required' => true,
                                            'type'=>'email',
                                            'id'=>'inputEmail'
                                        ]) ?>
                                    </div>

                                    <div class="form-label-group">
                                        <?= $this->Form->control('password', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Password',
                                            'label' => false,
                                            'required' => true
                                        ]) ?>
                                    </div>
                                   
                                    <?= $this->Form->submit(__('Add Account'), [
                                        'class'=>'btn btn-success  text-uppercase font-weight-bold mb-2'
                                    ]); ?>
                                    <?= $this->Html->link("Already have an account?", ['action' => 'login']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
