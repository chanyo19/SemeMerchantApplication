<template>

    <ul class="dropdown-menu dropdown-menu-lg noti-list-box"  >
        <li class="text-center notifi-title" v-if="user2==1">Notification</li>
        <div v-if="user2==2 || user2==3">
            <li class="text-center notifi-title">Notification <span v-if="is_available" class="badge badge-xs badge-success">{{count}}</span></li>
            <li class="list-group">
                <!-- list item-->
                <a v-bind:href="'/read/'+item[2]+'/'+item[3]" @click="Max()"  v-for="item in data" class="list-group-item">
                    <div class="media">
                        <div class="media-heading">{{item[0]}} <span><a href="#" class="btn btn-success btn-sm">Mark as read</a> </span></div>
                        <p class="m-0">
                            <small>{{item[1]}}</small>
                        </p>

                    </div>

                </a>


                <!-- list item-->

            </li>

            <li class="text-center" v-if="!is_available">No New Notifications</li>
        </div>



    </ul>
</template>

<script>

    import moment from 'moment';

    //import Echo from 'laravel-echo'
    export default {
    props:['user2'],
        mounted() {
            this.getData();
            Echo.channel('uploaded')
                .listen('.DocUploaded', (data) => {
                    console.log(data)
                    this.uploaded_by=data.name;
                    this.uploaded_doc_title=data.title.title;
                    //console.log('Broadcast received.'+data);
                    axios.get('/AXICBDCHDHDHJSHDJSHHFBDJCBJD123/getusertype').then(
                        res=>{
                            //console.log(res.data)
                            // this.user=res.data;
                            if(res.data==2){
                                swal(this.uploaded_by+" Has Been Uploaded "+this.uploaded_doc_title+ " Documents");
                                //swal("Uploaded");
                            }

                        }
                    );

                        if(data){


                        }
                        console.log(this.user);
                        //console.log(this.user)
                    // Push data to posts list.

                });


        },


        data() {
            return {
                count: null,
                data:[

                ],
                is_available:false,
                user:'',
                uploaded_by:'',
                uploaded_doc_title:'',

            }
        },
        methods:{
            Max(){
                this.count++;

            },
            getData(){
                axios.get('/api/getnotifications').then(res=>{

                   console.log(res.data.name);
                    for(var i=0;i<res.data.name.length;i++){

                        this.data.push([res.data.name[i].title, moment.utc(res.data.name[i].created_at).local().fromNow(),res.data.name[i].id,res.data.name[i].type]);


                    }
                  //  console.log(this.data);
                    this.count=res.data.count[0].count;
                    if(this.count>0){
                        this.is_available=true;
                    }

                }).catch(error=>{
                    console.log(error)
                });
            }
        }



    }
</script>
