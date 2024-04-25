<template>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="loginModalLabel">
                    <img class="img-responsive" alt="logo" src="https://arvices.com/job-asset/img/logo.png"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane show fade in active" id="Login">
                                <form class="form-horizontal">
           <ul class="alert alert-danger list-group" v-if="form.errs.length > 0">
                                        <li class="list-group-item" v-for="error in form.errs" :key="form.errs.indexOf(error)">
                                            {{ error }}
                                        </li>
                                    </ul>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input v-model="form.email" type="text" name="email"
                                        placeholder="Enter Email"
                                            class="form-control" :class="{ 'is-invalid': 
                                            form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                    <input v-model="form.password" type="password" name="password"
                                        placeholder="Enter Password"
                                            class="form-control" :class="{ 'is-invalid': 
                                            form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="checkbox" name="remember" v-model="form.remember" class="form-check-input" id="exampleCheck1">
                                     <label for="exampleInputPassword1" class="control-label">
                                        Remember Me</label>
                                    </div>
                                    <div class="col-sm-12">
                                     <label for="exampleInputPassword1" class="control-label">
                                        <a href="/forgot-password">Forgot your password? </a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" :disabled="!isValidLoginForm" @click="attemptLogin" class="btn btn-success btn-sm">
                                            Login</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="Registration">
                                <form role="form" class="form-horizontal" @submit.prevent="createUser()">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                    <input v-model="form.name" type="text" name="name"
                                    placeholder="Enter Name"
                                        class="form-control" :class="{ 'is-invalid': 
                                        form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input v-model="form.email" type="text" name="email"
                                        placeholder="Enter Email"
                                            class="form-control" :class="{ 'is-invalid': 
                                            form.errors.has('email') }"> 
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input v-model="form.phone" type="phone" name="phone"
                                        placeholder="Enter Contact Number"
                                            class="form-control" :class="{ 'is-invalid': 
                                            form.errors.has('phone') }"> 
                                        <has-error :form="form" field="phone"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input v-model="form.type" type="hidden" name="type" value="user">
                                        <input v-model="form.password" type="password" name="password"
                                        placeholder="Enter Password"
                                            class="form-control" :class="{ 'is-invalid': 
                                            form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Save & Continue</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with"  @click="googleLogin">
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn red">
                                        <i class="fa fa-google-plus fa-2x"></i></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-secondary">
                                    Continue with Google545
                                    </button>
                            </div>
                        </div>
                        <div class="row text-center sign-with"  @click="facebookLogin">
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn green">
                                        <i class="fa fa-facebook fa-2x"></i></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-secondary">
                                    Continue with facebook
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import axios from 'axios'
    export default {
        data(){
            return {
                form: new Form({
                    id:'',
                    name : '',
                    email : '',
                    phone : '',
                    password : '',
                    type : 'User',
                    remember : true,
                    errs : []
                })
            }
        },
        methods: {

        emailIsValid(mail) 
            {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email))
            {
                return (true)
            } else
                return (false)
            },
            attemptLogin(){
                this.form.errs = []
                axios.post('/login', {
                    email: this.form.email, password: this.form.password, remember: this.form.remember
                }). then(resp => { 
                    console.log(resp)
                       window.location.assign("/")
                }).catch(error => {
                     if(error.response.status == 422){
                         this.form.errs.push("We couldn't verify your account details.")
                     } else {
                          this.form.errs.push("Something went wrong, please refresh and try again.")
                     }
                    
                })
            },
            googleLogin(){
                window.location.assign("https://arvices.com/auth/google")
            },
            facebookLogin(){
                window.location.assign("https://arvices.com/auth/facebook")
            },
            createUser(){
                this.$Progress.start();
                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#loginModal').modal('hide')
                    
                axios.post('/login', {
                    email: this.form.email, password: this.form.password, remember: this.form.remember
                }). then(resp => { 
                    console.log(resp)
                       window.location.assign("/")
                }).catch(error => {
                    console.log(error)
                })


                    toast({
                    type: 'success',
                    title: 'Successfully Registered'
                    })
    
                    this.$Progress.finish();
                    
                })
                .catch(()=>{

                })
            }
        },
       computed: {
           isValidLoginForm() {
               return this.emailIsValid() && this.form.password
           }
       } 
    }
</script>

