<template>
    <section class="membercard dark"> 
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header olx-header">
                            Invitation Maker 
                        </div>
                        <div class="card-body post-property">
                                <button class="btn btn-guest btn-block" value="create" @click="addVue($event)">Create Invitation</button>
                                <button class="btn btn-guest btn-block"  @click="addLink()">My Events</button>
                                <button class="btn btn-guest btn-block" value="email" @click="addVue($event)">Guest Email List</button>
                                <button class="btn btn-guest btn-block" value="phone" @click="addVue($event)">Guest Contact Numbers</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div v-if="create">
                    <invitation-component></invitation-component>
                    </div> 
                    <div v-if="event">
                    <event-component></event-component>
                    </div>
                    <div v-if="email">
                    <guestEmail-component></guestEmail-component>
                    </div> 
                    <div v-if="phone"> 
                    <guestPhone-component></guestPhone-component>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
                data(){
            return {
                create: true,
                email: false,
                phone: false,
                event: false,
            }
        },

        methods: {
            addVue(event)
            {
                if(event.target.value == 'create'){
                    this.create = true;
                    this.email = false;
                    this.phone = false;
                    this.event = false;
                }
                else if(event.target.value == 'email'){
                    this.create = false;
                    this.email = true;
                    this.phone = false;
                    this.event = false;
                }
                else if(event.target.value == 'phone'){
                    this.create = false;
                    this.email = false;
                    this.phone = true;
                    this.event = false;
                }
                else if(event.target.value == 'event'){
                    this.create = false;
                    this.email = false;
                    this.phone = false;
                    this.event = true;
                }
                else{
                    this.create = false;
                    this.email = false;
                    this.phone = false;
                    this.event = false;
                }
            },
            addLink()
            {
                 window.open("/myevents");
            }
        },
        mounted() {
            console.log('Component mounted.'+value)
        }
    }
</script>
