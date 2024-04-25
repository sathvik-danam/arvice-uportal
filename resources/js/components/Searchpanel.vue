<template>
		<section class="main-banner" style="background:#242c36 url(job-asset/img/slider-01.jpg) no-repeat">
			<div class="container">
				<div class="caption">
					<h2>Choose the Best Professionals</h2>
					<form @submit.prevent="searchProfession()">
						<fieldset>
							<div class="col-md-4 col-sm-4 no-pad">
								<select class="selectpicker border-right">
                                <option value="">Select Your City</option>
                                <option v-for="city in cities.data" :key="city.id">
                                {{ city.city}}</option>
 
                                </select>
							</div>
							<div class="col-md-6 col-sm-6 no-pad">
								<!-- <input type="text" class="form-control border-right" placeholder="Search for a Service E.g., Photographer, Electrician etc." /> -->
                                <select class="selectpicker border-right">
                                <option value="">Search for a Service E.g., Photographer, Electrician etc.</option>
                                <option v-for="post in posts.data" :key="post.id">
                                {{ post.profession}}</option>

                                </select>
							</div>
							<div class="col-md-2 col-sm-2 no-pad">
								<input type="submit" class="btn seub-btn" value="submit" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</section>
</template>

<script>
        export default {
        data(){
            return {
                posts: {},
                cities: {} 
            }
        },
        methods: {
            loadSubcategories(){
                    axios.get("api/mypost").then(({ data }) => (this.posts = data));
            },
            loadCities(){
                    axios.get("api/city").then(({ data }) => (this.cities = data));
            },
            searchProfession(){
              window.location.assign("/")
          }
        },
        mounted() {
             this.loadSubcategories();
             this.loadCities();
             this.cities();
        }
    }
</script>
