<template>
    <div class="container">
        <div v-if="list">
            <guestlist-component></guestlist-component>
        </div> 
    <div v-if="event">    
        <div class="row justify-content-center">
    <div class="row mt-4">
        <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Event List</h3>

              <!-- <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Add Event<i class="fa fa-phone fa-fw"></i></button>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive table-dark no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th >Event Title</th>
                  <th>Event Type</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Guest Response</th>
                  <th>Modify</th>
                </tr>
                <tr v-if="users.data == 0">
                    <td colspan="4" align="center"><h3>No Event Found!</h3></td>
                </tr>
                <tr v-for="user in users.data" :key="user.id"> 
                  <td>{{ user.event_title }}</td>
                  <td>{{ user.event_type }}</td>
                  <td>{{ user.event_date | myDate}}</td>
                  <td>{{ user.event_time }}</td>
                  <td><button class="btn btn-success" value="create" @click="addVue()">View Details</button></td>
                  <td>
                      <a href="#" @click="editModal(user)"> 
                      <i class="fa fa-edit blue"></i></a>/
                      <a href="#" @click="deleteUser(user.id)">
                          <i class="fa fa-trash red"></i> 
                      </a>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="card-footer">
                <pagination :data="users" 
                @pagination-change-page="getResults"></pagination>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Phone Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()">
            <div class="modal-body">

            <div class="form-group">
            <label for="event_title">Event Title</label>
            <input v-model="form.event_title" required size="70" type="text" name="event_title"
                                    placeholder="I'm going to celebrate my birthday."
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('event_title') }">
                                <has-error :form="form" field="event_title"></has-error>
            </div>   
            <div class="form-group">
                <label for="event_type">Event Type</label>
                    <input v-model="form.event_type" required size="70" type="text" name="event_type"
                        placeholder="Event Type E.g., Birthday, Wedding, Anniversary etc."
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('event_type') }">
                    <has-error :form="form" field="event_type"></has-error>
            </div>  

            <div class="form-group">
                <label for="hosted_by">Hosted By</label>
                    <input v-model="form.hosted_by" required size="70" type="text" name="hosted_by"
                        placeholder="Enter the Host Name"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('hosted_by') }">
                    <has-error :form="form" field="hosted_by"></has-error>
            </div>  
            <div class="form-group">
                <label for="event_date">Event Date</label>
                    <input v-model="form.event_date" autocomplete="off" size="70"  type="text" name="date" placeholder="Date"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('event_date') }">
                    <has-error :form="form" field="event_date"></has-error>
            </div>  
            <div class="form-group">
                <label for="event_time">Event Time</label>
                    <input v-model="form.event_time" autocomplete="off" size="70" type="text" name="time"
                        placeholder="Event Time"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('event_time') }">
                    <has-error :form="form" field="event_time"></has-error>
            </div>  
            <div class="form-group">
                <label for="event_phone">Contact Number</label>
                    <input v-model="form.event_phone" required type="tel" size="70" name="event_phone"
                        placeholder="Enter Contact Number"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('event_phone') }">
                    <has-error :form="form" field="event_phone"></has-error>
            </div>  
            <div class="form-group">
               <label for="message">Message</label>
                    <textarea class="form-control summernote" id="summernote" :class="{ 'is-invalid': 
                        form.errors.has('message') }" v-model="form.message" rows="3"></textarea>
                    <has-error :form="form" field="message"></has-error>
            </div>  
            <br/>
            <hr/>
                <h5>Address Details</h5>
            <div class="form-group">
               <label for="street-landmark">Landmark</label>
                <input v-model="form.landmark"  type="text" size="70" name="landmark"
                    placeholder="Enter Landmark"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('landmark') }">
                <has-error :form="form" field="landmark"></has-error>
            </div>  
            <div class="form-group">
               <label for="street-address">Address</label>
                <input v-model="form.address"  type="text" size="70" name="address"
                    placeholder="Enter Address"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('address') }">
                <has-error :form="form" field="address"></has-error>
            </div>  
            <div class="form-group">
               <label for="enter-city">Enter City</label>
                <input v-model="form.city" type="text"  name="city" size="70"
                    placeholder="Enter City" 
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('city') }">
                    <div id="countryList"></div>
                <has-error :form="form" field="city"></has-error>
            </div>  
            <div class="form-group">
               <label for="street-state">State</label>
                <input v-model="form.state"  type="text" name="state" size="70"
                    placeholder="Enter State"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('state') }">
                <has-error :form="form" field="state"></has-error>
            </div>  

            <div class="form-group">
                <label for="relation"><h5>Select Guest List</h5></label>
                    <label class="mycheck">Friends
                        <input type="checkbox" checked value="Friends">
                        <span class="checkmark"></span>
                    </label>
                    <label class="mycheck">Family
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="mycheck">Close Friends
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="mycheck">Relatives
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="mycheck">Work
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="mycheck">Neighbours
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
            </div>  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button v-show="editmode" type="submit" class="btn btn-primary">Update</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div> 
</template>

<script>
    export default {
        data(){
            return {
                list: false,
                event: true,
                editmode: true,
                users: {},
                  form: new Form({
                    id:'',
                    event_title:'',
                    event_type:'',
                    hosted_by:'',
                    event_date:'',
                    event_time:'',
                    event_phone:'',
                    landmark:'',
                    address:'',
                    city:'',
                    state:'',
                    message:'',
              })
            }
        },
        methods: {
        addVue()
        {            
            window.location.assign("/");
        },
		getResults(page = 1) {
			axios.get('api/postinvitation?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		},
            updateUser(){
                this.$Progress.start();
                this.form.put('api/postinvitation/'+this.form.id)
                .then(()=>{
                    $('#addNew').modal('hide');
                            swal(
                            'Updated!',
                            'Information has been updated',
                            'success'
                            )
                             this.$Progress.finish();
                             Fire.$emit('AfterCreate');
                })
                .catch(()=> {
                    this.$Progress.fail();
                });
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
        },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
        },
            deleteUser(id){
                swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //Send request to the server
                    if(result.value){
                        this.form.delete('api/postinvitation/'+id).then(()=>{
                            swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            Fire.$emit('AfterCreate');
                        }).catch(()=>{
                            swal("Failed!", "There was something wrong.", "warning");
                        });
                    }
                })
            },
            loadUsers(){
                    axios.get("api/postinvitation").then(({ data }) => (this.users = data));
            },
          createUser(){
              this.$Progress.start();
              this.form.post('api/postinvitation')
              .then(()=>{
                    $('#addNew').modal('hide');
                            swal(
                            'Updated!',
                            'Information has been added',
                            'success'
                            )
                             this.$Progress.finish();
                             Fire.$emit('AfterCreate');
                  this.$Progress.finish();
              })
              .catch(()=>{

              })
          }
        },
        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data)=>{
                    this.users = data.data
                })
                .catch(()=>{

                })
            });
            this.loadUsers();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
            });
        }
    }
</script>
