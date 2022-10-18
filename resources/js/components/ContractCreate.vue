<template>
    <div class="container">







        <div class="flex items-center justify-center p-12">

            <div v-if="loading" class="absolute right-1/2 bottom-1/2  transform translate-x-1/2 translate-y-1/2 ">
                <div class="border-t-transparent border-solid animate-spin  rounded-full border-blue-400 border-8 h-64 w-64"></div>
            </div>




            <div v-else class="mx-auto w-full max-w-[800px]">

                <div v-if="loading" class=" right-1/2 bottom-1/2  transform translate-x-1/2 translate-y-1/2 ">
                    <div class="border-t-transparent border-solid animate-spin  rounded-full border-blue-400 border-4 h-8 w-4"></div>
                </div>

                <div class="mb-5 font-extrabold text-blue-400 text-xl ">
                    NEW CONTRACT
                </div>
              <form >
                <div class="mb-5">

                  <input
                    type="text"

                    v-model="form.full_name"
                    id="name"
                    placeholder="Full Name"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none  focus:shadow-md"
                  />
                  <span class="text-red-600" v-if="errors.full_name">{{ errors.full_name[0] }}</span>


                </div>


                <div class="mb-5">

                  <input
                    type="text"
                     v-model="form.subject"
                    id="subject"
                    placeholder="Contract subject"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none  focus:shadow-md"
                  />
                  <span class="text-red-600" v-if="errors.subject">{{ errors.subject[0] }}</span>
                </div>
                <div class="mb-5">

                  <textarea
                    rows="4"
                    v-model="form.content"
                    placeholder="Content"
                    class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none  focus:shadow-md"
                  ></textarea>
                  <span class="text-red-600" v-if="errors.content">{{ errors.content[0] }}</span>
                </div>

                <div class="mb-5">

                    <input
                    type="text"

                    v-model="form.created_by"
                    id="name"
                    placeholder="Created By"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none  focus:shadow-md"
                  />

                  <span class="text-red-600" v-if="errors.created_by">{{ errors.created_by[0] }}</span>
                  </div>


                <div>
                  <button
                    class="  bg-blue-400 py-3 px-8 text-base font-semibold text-white outline-none"
                    @click.prevent="create"
                    :disabled="loading"
                  >
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>





    </div><!-- end container -->
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {


           form:{

            full_name:null,
            subject:null,
            content:null,
            created_by:null,


           },

           errors:{},
           status:false,
           loading:false,



          }
    },
    methods: {
        create() {
            this.errors='';
            this.loading = true;


          axios.post('api/contract/create',this.form)
          .then(()=>{

            this.status=true;




          }).catch(error=>this.errors = error.response.data.errors).then(()=>{
              this.loading=false;

            });

        }

    },


};
</script>
