<template>
    <div class="container">
        <div v-if="event">
           <event-component></event-component>
        </div> 
    <div v-if="list"> 
    <div class="row justify-content-center">
    <div class="mt-4">
        <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Your Guest List</h3>

              <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Add More Guest<i class="fa fa-envelope fa-fw"></i></button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-secondary" value="create" @click="addVue($event)">Return to Event List<i class="fa fa-tasks fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive table-dark no-padding">
              <table class="table table-hover">
                <thead><tr>
                  <th>Guest Name</th>
                  <th>Guest Email</th>
                  <th>Status</th>
                  <th>Total Guest</th>
                  <th>Modify</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="users.data == 0">
                    <td colspan="4" align="center"><h3>No Data Found!</h3></td>
                </tr>
                <tr v-for="user in users.data" :key="user.id"> 
                  <td>{{ user.name }}</td>
                  <td>{{ user.email }}</td>
                  <td>{{ user.attending_status }}</td>
                  <td>{{ user.total_guest }}</td>
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
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="card-footer">
                <pagination :data="users" 
                @pagination-change-page="getResults"></pagination>
            </div>
          </div>
    </div>
                </div>
        </div>
          <!-- /.box -->

        <!-- Modal -->
        <div class="modal" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()">
            <div class="modal-body">

            <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('name') }" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="name"></has-error>
            </div>   
            <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('email') }" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="email"></has-error>
            </div>   
            <div class="form-group">
            <label for="exampleInputEmail">Attending Status</label>
            <input v-model="form.attending_status" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('attending_status') }" id="attending_status" aria-describedby="attending_statusHelp" placeholder="Enter Attending Status">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="attending_status"></has-error>
            </div>   
            <div class="form-group">
            <label for="exampleInputTotalGuest">Total Guest</label>
            <input v-model="form.total_guest" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('total_guest') }" id="total_guest" aria-describedby="totalGuestHelp" placeholder="Enter Total Guest">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="total_guest"></has-error>
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
                editmode: true,
                list: true,
                event: false,
                users: {},
                  form: new Form({
                    id:'',
                    email : '',
                    name : '',
                    attending_status: '',
                    total_guest: '',
              })
            }
        },
        methods: {
		getResults(page = 1) {
			axios.get('api/guestlist?page=' + page)
				.then(response => {
					this.users = response.data;
				});
        },
     addVue(event)
        {
            if(event.target.value == 'create'){
                this.list = false;
                this.event = true;
            }
            else{
                this.list = false;
                this.event = false;
            }
        },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/guestlist/'+this.form.id)
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
                        this.form.delete('api/guestlist/'+id).then(()=>{
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
                    axios.get("api/guestlist").then(({ data }) => (this.users = data));
            },
          createUser(){
              this.$Progress.start();
              this.form.post('api/guestlist')
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
