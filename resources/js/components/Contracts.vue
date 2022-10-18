<template>
    <div class="container">

        <div v-if="loading" class="absolute right-1/2 bottom-1/2  transform translate-x-1/2 translate-y-1/2 ">
            <div class="border-t-transparent border-solid animate-spin  rounded-full border-blue-400 border-8 h-64 w-64"></div>
        </div>

        <div v-else class="table w-full p-2 ">

            <div class="mb-5 font-extrabold text-blue-400 text-xl ">
                Your Contracts ({{contracts.length }})
            </div>



            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-50 border-b">

                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                               Full Name

                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                              Subject

                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                               Created By

                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                              Created Date

                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Action

                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="contract in contracts" :key="contract.id" class="bg-gray-100 text-center border-b text-sm text-gray-600">

                        <td class="p-2 border-r">{{ contract.full_name }}</td>
                        <td class="p-2 border-r">{{ contract.subject }}</td>
                        <td class="p-2 border-r">{{contract.created_by}}</td>
                        <td class="p-2 border-r">{{ moment(contract.created_at).format("DD-MM-YYYY") }}</td>
                        <td>
                          <router-link :to="{name:'edit-contract', params:{id:contract.id}}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</router-link>

                        </td>
                    </tr>




                </tbody>
            </table>
        </div>













    </div><!-- end container -->
</template>

<script>
import axios from 'axios';
import moment from 'moment';


export default {

    data() {
        return {

           contracts:[],


           errors:{},
           status:false,
           loading:false,
           moment:moment



          }
    },
    methods: {
        user_contracts() {

            this.loading = true;

            axios.get('api/user/contracts')
            .then(({data}) => (this.contracts = data ))
            .then(()=>{
               this.loading = false;
            })
            .catch()


        }

    },
    created() {
        this.user_contracts();
    },




};
</script>
