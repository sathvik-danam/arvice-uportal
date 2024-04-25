<template>
       
    <div class="card">
        <div class="card-header olx-header">
            Create Invitation 
        </div>
        <div class="card-body post-property">
                <div class="col-md-12">   
                <form @submit.prevent="createUser()">
                    <div class="container">    
                        <table>   
                            <tr class="required">
                                <td class="noview"><label for="event_title">Event Title</label></td>
                                <td class="fview"><input v-model="form.event_title" required size="70" type="text" name="event_title"
                                    placeholder="I'm going to celebrate my birthday."
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('event_title') }">
                                <has-error :form="form" field="event_title"></has-error>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="event_title">Event Title</label></td>
                                <td class="fview">
                                <select v-model="form.event_type" name="event_type" id="event_type"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('event_type') }">
                                <option value="">Event Type</option>
                                <option value="Anniversary">Anniversary</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Bachelor Party">Bachelor Party</option>
                                <option value="Beach Party">Beach Party</option>
                                <option value="BBQ">BBQ</option>
                                <option value="Book Club">Book Club</option>
                                <option value="Brunch / Lunch">Brunch / Lunch</option>
                                <option value="Cocktail Party">Cocktail Party</option>
                                <option value="Dinner Party">Dinner Party</option>
                                <option value="Engagement Party">Engagement Party</option>
                                <option value="Outdoor Fun">Outdoor Fun</option>
                                <option value="Pool Party">Pool Party</option>
                                <option value="Retirement / Farewell">Retirement / Farewell</option>
                                <option value="Reunions">Reunions</option>
                                <option value="Religious">Religious</option>
                                <option value="Theme Party">Theme Party</option>
                                <option value="Trips / Gateways">Trips / Gateways</option>
                                <option value="Weddings / Shaadi">Weddings / Shaadi</option>
                                <option value="Others">Others</option>
                                </select>
                                <has-error :form="form" field="event_type"></has-error>
                            </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="hosted_by">Hosted By</label></td>
                                <td class="fview">
                                <input v-model="form.hosted_by" required size="70" type="text" name="hosted_by"
                                    placeholder="Enter the Host Name"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('hosted_by') }">
                                <has-error :form="form" field="hosted_by"></has-error>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="event_date">Event Date</label></td>
                                <td class="fview">
                                    <datepicker v-model="form.event_date" :format="customFormatter"  input-class="form-control" placeholder="Enter Event Date">
                                    </datepicker>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="event_time">Event Time</label></td>
                                <td class="fview">
                                    <div class="form-control">
                                    <vue-timepicker format="hh:mm A" v-model="item1" @change="joinTime()"  name="event_time"
                                    placeholder="Event Time"></vue-timepicker>
                                    </div>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="event_phone">Contact Number</label></td>
                                <td class="fview">
                                <input v-model="form.event_phone" required type="tel" size="70" name="event_phone"
                                    placeholder="Enter Contact Number"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('event_phone') }">
                                <has-error :form="form" field="event_phone"></has-error>
                                </td>
                            </tr>
                        <br/>
                        <hr/>
                            <h5>Address Details</h5>
                            <tr class="required">
                                <td class="noview"><label for="street-landmark">Landmark</label></td>
                                <td class="fview">
                                    <input v-model="form.landmark"  type="text" size="70" name="landmark"
                                    placeholder="Enter Landmark"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('landmark') }">
                                <has-error :form="form" field="landmark"></has-error>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="street-address">Address</label></td>
                                <td class="fview">
                                    <input v-model="form.address"  type="text" size="70" name="address"
                                    placeholder="Enter Address"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('address') }">
                                <has-error :form="form" field="address"></has-error>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="enter-city">Enter City</label></td>
                                <td class="fview">
                                <input v-model="form.city" type="text"  name="city" size="70"
                                    placeholder="Enter City" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('city') }">
                                    <div id="countryList"></div>
                                <has-error :form="form" field="city"></has-error>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="street-state">State</label></td>
                                <td class="fview">
                                    <input v-model="form.state"  type="text" name="state" size="70"
                                    placeholder="Enter State"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('state') }">
                                <has-error :form="form" field="state"></has-error>
                                </td>
                            </tr>
                            <tr class="required">
                                <td class="noview"><label for="message">Select Guest</label></td>
                                <td class="fview">
                                <select v-model="form.relation" name="relation" id="relation"
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('type') }" >
                                <option value="Friend">Friend</option>
                                <option value="Relative">Relative</option>
                                <option value="Work">Work</option>
                                <option value="Other">Other</option>
                                <option value="All">All Guest</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                                </td>
                            </tr> 
                            <tr class="required1">
                                <td class="noview"><label for="message">Message</label></td>
                                <td class="fview">
                                <textarea class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('message') }" v-model="form.message" rows="3" placeholder="Enter Message"></textarea>
                                <has-error :form="form" field="message"></has-error>
                                </td>
                            </tr> 
                        </table> 
                    </div>
                    <div class="form-group">
                        <div class="border-upper">
                            <hr>
                            <button class="btn brows-btn" type="submit">
                                Send Invitation
                            </button>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
                    </div>			
</template>


<script>
import Datepicker from 'vuejs-datepicker';
import VueTimepicker from 'vue2-timepicker';
    export default {
        data(){
            return {
                item1:{
                    hh: '00',
                    mm: '00',
                    a: 'am'
                },
                editmode: true,
                users: {},
                  form: new Form({
                    id:'',
                    item2: '',
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
                    relation:'All',

              })
            }
        },
        methods: {
    joinTime: function () {		
		this.form.event_time = this.item1.hh +":"+this.item1.mm+" "+this.item1.a; 	
    },
          createUser(){
              this.$Progress.start();
              this.form.post('api/postinvitation')
              .then(()=>{
                    $('#addNew').modal('hide');
                            swal(
                            'Added!',
                            'Your invitation details has been added',
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
          components: {
    Datepicker,
    VueTimepicker, 
  },

        created() {
        } 
    }
</script>



