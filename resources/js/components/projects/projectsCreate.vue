<template>
<div>


      <section class="content" >
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-purple">
                      <div class="card-header row">

                            <div class="col-md-8">
                                   <h3 class="card-title-rtl" v-show="toggletable == true">  {{ $trans('app.projects') }}</h3>
                                <h3 class="card-title-rtl" v-show="toggletable == false">  {{ $trans('app.tasks') }}</h3>

                          </div>
                          <div class="col-md-2">
                             <span  v-show="toggletable == false">{{ $trans('app.Code') }}:  {{allProjects.id}} </span>
                          </div>
                          <div class="col-md-2 ">
                              <el-button type="primary" class="text-sm " size="small"  v-show="toggletable == false"  :title="$trans('app.back')"  @click.prevent="toggletable = true" icon="el-icon-back" plain></el-button>
                          </div>
                      </div>

                       <div class="card-body">
                    <div class="row">
                    <div  class="col-md-2">
                             <el-button  v-show="toggletable == true" type="primary" round @click.prevent="showdialogProject()"> <i class="fas fa-plus"></i> {{ $trans('app.add') }}</el-button>

                                <el-dialog
                                    :title="$trans('app.add_projects')"
                                    :visible.sync="addprojectVisible"
                                    width="50%"
                                    :before-close="handleClose" center>
                                    <span>
                                        <el-form label-width="20%"  @submit.prevent="addproject">
                                            <el-form-item >
                                                 <label for="">{{$trans('app.name')}} </label>
                                                <el-input :placeholder="$trans('app.name')"  v-model="addprojectForm.name"></el-input>
                                                <span class="text-danger" v-if="errors['addprojectForm.name']">
                                                    {{errors['addprojectForm.name'][0]}}
                                                </span>
                                                 </el-form-item>
                                               <el-form-item >
                                                    <label for="">{{$trans('app.description')}} </label>
                                                 <el-input type="textarea" :placeholder="$trans('app.description')"  v-model="addprojectForm.description"></el-input>
                                                <span class="text-danger" v-if="errors['addprojectForm.description']">
                                                    {{errors['addprojectForm.description'][0]}}
                                                </span>
                                                </el-form-item>

                                                <el-form-item >
                                                      <label for="">{{$trans('app.location')}} </label> <br>
                                                        <el-select v-model="addprojectForm.location" :placeholder="$trans('app.location')">
                                                        <el-option
                                                        v-for="Province in Provinces.Provinces"
                                                        :key="Province.id"
                                                        :label="Province.name"
                                                        :value="Province.name">
                                                        </el-option>
                                                         </el-select>
                                                           <span class="text-danger" v-if="errors['addprojectForm.location']">
                                                        {{errors['addprojectForm.location'][0]}}
                                                    </span>
                                                </el-form-item>



                                        </el-form>
                                    </span>
                                    <span slot="footer" class="dialog-footer">
                                        <el-button @click="addprojectVisible = false">{{$trans('app.cancel')}}</el-button>
                                        <el-button type="primary"  @click.prevent="addproject()">{{$trans('app.add')}}</el-button>
                                    </span>
                                    </el-dialog>
                    </div>
                    <div  class="col-md-3">

                     </div>

                    <div  class="col-md-6 d-flex justify-content-end mb-2" >
                           <el-button type="primary" class="mt-2 " v-show="toggletable == true" size="mini" round :loading="loadingupdate"    @click="getProjects()"  icon="el-icon-refresh"> {{$trans('app.redevelop')}}</el-button>
                    </div>

                    </div>
                                <el-table
                                v-loading="loadingupdate"
                                v-show="toggletable == true"
                                :data="allProjects.data.filter(data => !search || data.family_name.toLowerCase().includes(search.toLowerCase()))"
                                style="width: 100%"
                                fit
                                height="500">


                                <el-table-column
                                :label="$trans('app.number')"
                               type="index"
                                width="50"
                                align= "center">
                                </el-table-column>

                                <el-table-column
                                :label="$trans('app.name')"
                                prop="name"
                                align= "center">
                                </el-table-column>

                                <el-table-column
                                :label="$trans('app.description')"
                                prop="description"
                                align= "center">
                                   <template slot-scope="scope">
                                     {{ scope.row.description | str_limit}}
                                    </template>
                                </el-table-column>

                                <el-table-column
                                :label="$trans('app.location')"
                                prop="location"
                                align= "center">
                                </el-table-column>

                                <el-table-column
                                :label="$trans('app.created_by')"
                                prop="created_by"
                                align= "center">
                                </el-table-column>

                                <el-table-column
                                :label="$trans('app.date')"
                                prop="created_at"
                                align= "center">
                                  <template slot-scope="scope">
                                     {{ scope.row.created_at | timeFormat}}
                                    </template>
                                </el-table-column>

                                <el-table-column
                                :label="$trans('app.tasks')"
                                prop="created_at"
                                align= "center">
                                  <template slot-scope="scope">
                                        <el-button
                                        size="small"
                                        @click.prevent="handleShow(scope.$index, scope.row)"  >{{$trans('app.show')}}</el-button>                                    </template>
                                </el-table-column>


                                  <el-table-column
                align="right">
                <template slot="header" slot-scope="scope">
                    <el-input
                    v-model="search"
                    placeholder="Type to search"/>
                 {{scope.row}}
                </template>
                <template slot-scope="scope">
                         <el-button  size="mini"  @click.prevent="editproject(scope.row)" v-show="user_Permissions.project_update == true" >{{$trans('app.edit')}}</el-button>
                         <el-button  size="mini"  @click.prevent="editproject(scope.row)" v-show="user_Permissions.project_update != true" disabled>{{$trans('app.edit')}}</el-button>

                                 <el-dialog
                                    title="Edit Catigory"
                                    :visible.sync="editProjectVisible"
                                    width="50%"
                                    :before-close="handleClose" center>
                                    <span>
                                        <el-form label-width="20%"  @submit.prevent="editproject">

                                             <el-form-item >
                                                 <label for="">{{$trans('app.name')}} </label>
                                                <el-input :placeholder="$trans('app.name')"  v-model="addprojectForm.name"></el-input>
                                                <span class="text-danger" v-if="errors['name']">
                                                    {{errors['name'][0]}}
                                                </span>
                                                 </el-form-item>
                                               <el-form-item >
                                                    <label for="">{{$trans('app.description')}} </label>
                                                 <el-input type="textarea" :placeholder="$trans('app.description')"  v-model="addprojectForm.description"></el-input>
                                                <span class="text-danger" v-if="errors['description']">
                                                    {{errors['description'][0]}}
                                                </span>
                                                </el-form-item>

                                                <el-form-item >
                                                      <label for="">{{$trans('app.location')}} </label> <br>
                                                        <el-select v-model="addprojectForm.location" :placeholder="$trans('app.location')">
                                                        <el-option
                                                        v-for="Province in Provinces.Provinces"
                                                        :key="Province.id"
                                                        :label="Province.name"
                                                        :value="Province.name">
                                                        </el-option>
                                                         </el-select>
                                                           <span class="text-danger" v-if="errors['location']">
                                                        {{errors['location'][0]}}
                                                    </span>
                                                </el-form-item>


                                                <el-form-item >
                                                     <label for="">{{$trans('app.created_by')}} </label> <br>
                                                 <el-select v-model="addprojectForm.created_by" placeholder="اسم الباحث">
                                                            <el-option
                                                        v-for="user in Provinces.users"
                                                        :key="user.id"
                                                        :label="user.first_name + ' ' + user.last_name "
                                                        :value="user.id">
                                                        {{user.first_name }} {{user.last_name }}
                                                        </el-option>
                                                    </el-select>
                                                    </el-form-item >
                                        </el-form>
                                    </span>
                                    <span slot="footer" class="dialog-footer">
                                        <el-button @click="editProjectVisible = false">{{$trans('app.cancel')}}</el-button>
                                        <el-button type="primary"  @click.prevent="updateProject(addprojectForm.id)">{{$trans('app.submit')}}</el-button>
                                    </span>
                                    </el-dialog>
                                <el-button
                                size="small"
                                type="danger"   v-show="user_Permissions.project_delete == true"
                                @click="handleDelete(scope.$index, scope.row)"  ><i class="el-icon-delete" ></i></el-button>

                                 <el-button
                                    size="small"
                                    type="danger"   v-show="user_Permissions.project_delete != true"
                                    @click="handleDelete(scope.$index, scope.row)"  disabled><i class="el-icon-delete" ></i></el-button>
                </template>
                </el-table-column>
                            </el-table>

                                <ul class="mb-4 mt-4 text-xs"   >
                                                <pagination :data="allProjects" @pagination-change-page="getResults"  :limit="1" :show-disabled='true'>
                                                    <span slot="prev-nav">&lt; Previous</span>
                                                    <span slot="next-nav">Next &gt;</span>
                                                </pagination>
                                            </ul>

<!-- //////////////////////////Start page 2 /////////////////////////// -->
                            <el-card class="box-card" v-show="toggletable == false">
                            <div slot="header" class="row">
                                <div class="col-md-6">
                                    <span>{{ TasksForm.name}}</span>
                                </div>
                                <div class="col-md-2">
                               <span class="badge rounded-pill bg-warning text-dark"> {{$trans('app.Created_By')}}:  <span>{{ TasksForm.created_by}}</span></span>

                                </div>
                                 <div class="col-md-2">
                                    <span class="badge rounded-pill bg-secondary"><span>{{ TasksForm.created_at |timeFormat}}</span></span>
                                </div>
                                <div class="col-md-2">
                                <el-button  size="small" v-show="toggletable == false" type="primary" round @click.prevent="showdialogTask()"> <i class="fas fa-plus"></i> {{ $trans('app.add_task') }}</el-button>


                                <el-dialog
                                    :title="$trans('app.add_task')"
                                    :visible.sync="addTaskVisible"
                                    width="50%"
                                    :before-close="handleClose" center>
                                    <span>
                                        <el-form label-width="20%"  @submit.prevent="addTask">
                                            <el-form-item >
                                                 <label for="">{{$trans('app.name')}} </label>
                                                <el-input :placeholder="$trans('app.name')"  v-model="addtaskForm.name"></el-input>
                                                <span class="text-danger" v-if="errors['name']">
                                                    {{errors['name'][0]}}
                                                </span>
                                                 </el-form-item>
                                               <el-form-item >
                                                    <label for="">{{$trans('app.task')}} </label>
                                                 <el-input type="textarea" :placeholder="$trans('app.task')"  v-model="addtaskForm.description"></el-input>
                                                <span class="text-danger" v-if="errors['description']">
                                                    {{errors['description'][0]}}
                                                </span>
                                                </el-form-item>

                                                 <el-form-item >
                                                         <label for="">{{$trans('app.status')}} </label> <br>
                                                        <el-radio   v-model="addtaskForm.status" value="1" label="1" > {{$trans('app.done')}} </el-radio>
                                                         <el-radio   v-model="addtaskForm.status" value="2" label="2"> {{$trans('app.not_done')}} </el-radio>
                                                </el-form-item>

                                                 <el-form-item >
                                                         <label for="">{{$trans('app.urgency')}} </label> <br>
                                                        <el-radio   v-model="addtaskForm.urgency" value="1" label="1" > {{$trans('app.important')}} </el-radio>
                                                         <el-radio   v-model="addtaskForm.urgency" value="2" label="2"> {{$trans('app.less_important')}} </el-radio>
                                                         <el-radio   v-model="addtaskForm.urgency" value="3" label="3"> {{$trans('app.normal')}} </el-radio>
                                                </el-form-item>


                                                 <el-form-item >
                                                         <label for="">{{$trans('app.date')}} </label> <br>
                                                        <el-date-picker
                                                        v-model="addtaskForm.date"
                                                        value-format="yyyy-MM-dd"
                                                        type="date"
                                                        format="yyyy-MM-dd"
                                                        placeholder="ادخل التاريخ">
                                                        </el-date-picker>
                                                </el-form-item>
                                        </el-form>

                                    </span>
                                    <span slot="footer" class="dialog-footer">
                                        <el-button @click="addTaskVisible = false">{{$trans('app.cancel')}}</el-button>
                                        <el-button type="primary"  @click.prevent="addtask(TasksForm.id)">{{$trans('app.add')}}</el-button>
                                    </span>
                                    </el-dialog>

                                </div>

                            </div>


                            <el-collapse  v-for="task in TasksForm.tasks" :key="task.id" class="mt-2" >
                                    <el-collapse-item  :name="task.id">
                                        <template slot="title" class="text-lg">
                                            {{task.name}}
                                        </template>
                                         <div class="row">
                                             <div class="col-md-10"></div>
                                             <div class="col-md-2">
                                              <el-button  size="mini"   @click.prevent="edittask(task)" >{{$trans('app.edit')}}</el-button>
                                                 <el-button

                                                size="small"
                                                type="danger"
                                                @click="handleDeleteTask(task)"  ><i class="el-icon-delete" ></i></el-button>
                                <el-dialog
                                    :title="$trans('app.add_task')"
                                    :visible.sync="editTaskVisible"
                                    width="50%"
                                    :before-close="handleClose" center>
                                    <span>
                                        <el-form label-width="20%"  @submit.prevent="addTask">
                                            <el-form-item >
                                                 <label for="">{{$trans('app.name')}} </label>
                                                <el-input :placeholder="$trans('app.name')"  v-model="addtaskForm.name"></el-input>
                                                <span class="text-danger" v-if="errors['name']">
                                                    {{errors['name'][0]}}
                                                </span>
                                                 </el-form-item>
                                               <el-form-item >
                                                    <label for="">{{$trans('app.task')}} </label>
                                                 <el-input type="textarea" :placeholder="$trans('app.task')"  v-model="addtaskForm.description"></el-input>
                                                <span class="text-danger" v-if="errors['description']">
                                                    {{errors['description'][0]}}
                                                </span>
                                                </el-form-item>

                                                 <el-form-item >
                                                         <label for="">{{$trans('app.status')}} </label> <br>
                                                        <el-radio   v-model="addtaskForm.status" value="1" label="1" > {{$trans('app.done')}} </el-radio>
                                                         <el-radio   v-model="addtaskForm.status" value="2" label="2"> {{$trans('app.not_done')}} </el-radio>
                                                </el-form-item>

                                                 <el-form-item >
                                                         <label for="">{{$trans('app.urgency')}} </label> <br>
                                                        <el-radio   v-model="addtaskForm.urgency" value="1" label="1" > {{$trans('app.important')}} </el-radio>
                                                         <el-radio   v-model="addtaskForm.urgency" value="2" label="2"> {{$trans('app.less_important')}} </el-radio>
                                                         <el-radio   v-model="addtaskForm.urgency" value="3" label="3"> {{$trans('app.normal')}} </el-radio>
                                                </el-form-item>


                                                 <el-form-item >
                                                         <label for="">{{$trans('app.date')}} </label> <br>
                                                        <el-date-picker
                                                        v-model="addtaskForm.date"
                                                        value-format="yyyy-MM-dd"
                                                        type="date"
                                                        format="yyyy-MM-dd"
                                                        placeholder="ادخل التاريخ">
                                                        </el-date-picker>
                                                </el-form-item>
                                        </el-form>
                                    </span>
                                    <span slot="footer" class="dialog-footer">
                                        <el-button @click="editTaskVisible = false">{{$trans('app.cancel')}}</el-button>
                                        <el-button type="primary"  @click.prevent="updateTask(TasksForm.id)">{{$trans('app.add')}}</el-button>
                                    </span>
                                    </el-dialog>
                                             </div>
                                         </div>
                                        <div class="row">
                                            <div class="col-md-6 text-md">
                                             {{$trans('app.task')}} : {{task.description}}
                                            </div>
                                            <div class="col-md-2 text-center">
                                              {{$trans('app.date')}}: {{task.dueDate }}
                                            </div>

                                            <div class="col-md-2 text-center">
                                              {{$trans('app.status')}}:
                                              <span v-show='task.status == 1'>  {{$trans('app.done')}}</span>
                                                <span v-show='task.status == 2'>  {{$trans('app.not_done')}}</span>
                                            </div>
                                            <div class="col-md-2 text-center">
                                              {{$trans('app.urgency')}}:
                                                <span v-show='task.urgency == 1' class="badge rounded-pill bg-danger">  {{$trans('app.important')}}</span>
                                                <span v-show='task.urgency == 2' class="badge rounded-pill bg-warning text-dark">  {{$trans('app.less_important')}}</span>
                                                  <span v-show='task.urgency == 3' class="badge rounded-pill bg-info text-dark">  {{$trans('app.normal')}}</span>
                                            </div>


                                        </div>

                                    </el-collapse-item>
                            </el-collapse>


                            </el-card>

<!-- //////////////////////////End page 2 /////////////////////////// -->


                        </div> <!-- end card-body-->
                          </div> <!-- end card card-->
                     <hr>

                </div>
                </div>
                </div>
            </section>
      </div>

</template>



<script>
  export default {
    data() {
      return {
        search:'',
        editProjectVisible: false,
        structureCount:{},
        allProjects:[],
        loadingupdate:false,
        toggletable: true,
        addprojectVisible: false,
        loadingButton: false,
        addTaskVisible: false,
        addprojectForm:{},
        addtaskForm:{},
        editTaskVisible: false,
        TasksForm:{},
        errors:{},
        links: [],
         state: '',
        Provinces:'',
        user_Permissions: '',
      }
    },
    methods: {
       showdialogProject(){
            this.addprojectVisible = true;
       } ,

       showdialogTask(){
            this.addTaskVisible = true;
       },

    addproject(){
         var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
          this.loadingButton = true;
         if(Lang =='ar'){
          axios.post(`/ar/apiprojects`,{ addprojectForm: this.addprojectForm}).then(res => {
              this.addprojectVisible = false;
                  this.loadingButton = false;
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'تم إنشاء المشروع بنجاح, شكراً لك',
                    showConfirmButton: false,
                    timer: 1800
                    })
                    this.clearData();
                    this.getProjectsAfterAdd();
                        }
                ).catch(err =>{ this.errors = err.response.data.errors;
                     this.loadingButton = false;
                         Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            text: '.من فضلك ادخل جميع البيانات المطلوبه',
                            showConfirmButton: true,
                            timer: 2000
                            });

                });

               }else{
                      axios.post(`/en/apiprojects`,{ addprojectForm: this.addprojectForm}).then(res => {
                        this.addprojectVisible = false;
                           this.loadingButton = false;
                             Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Project has been Created successfully.',
                                showConfirmButton: true,
                                timer: 2000
                                });
                            this.clearData();
                            this.getProjectsAfterAdd();
                    }
                ).catch(err =>{ this.errors = err.response.data.errors
                     this.loadingButton = false;
                 Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                text: 'Please enter all the required information.',
                                showConfirmButton: true,
                                timer: 2000
                        });


                });
               }
             },




    editproject(row){
        this.editProjectVisible = true;
        this.addprojectForm = row;
    },


    updateProject(row){
        var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

       if(Lang =='ar'){
          axios.put(`/ar/apiprojects/${row}`,this.addprojectForm ).then(res => {
                this.editProjectVisible = false;
                  this.loadingButton = false;
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'تم تعديل المشروع بنجاح, شكراً لك',
                    showConfirmButton: false,
                    timer: 1800
                    });
                        // this.clearData();
                        }
                ).catch(err =>{ this.errors = err.response.data.errors;
                     this.loadingButton = false;
                         Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            text: '.من فضلك ادخل جميع البيانات المطلوبه',
                            showConfirmButton: true,
                            timer: 2000
                            });

                });

               }else{
                   axios.put(`/en/apiprojects/${row}`,this.addprojectForm).then(res => {
                                 this.editProjectVisible = false;
                           this.loadingButton = false;
                             Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Project has been updated successfully.',
                                showConfirmButton: true,
                                timer: 2000
                                });
                    }
                ).catch(err =>{ this.errors = err.response.data.errors
                     this.loadingButton = false;
                 Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                text: 'Please enter all the required information.',
                                showConfirmButton: true,
                                timer: 2000
                        });


                });
               }

    },


  addtask(projectId){
         var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
          this.loadingButton = true;
         if(Lang =='ar'){
          axios.post(`/ar/apitasks`,{ addtaskForm: this.addtaskForm, projectId}).then(res => {
              this.addTaskVisible = false;
                  this.loadingButton = false;
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'تم إنشاء المهمة بنجاح, شكراً لك',
                    showConfirmButton: false,
                    timer: 1800
                    })
                    this.clearData();
                    this.getProjectsAfterAdd();
                        }
                ).catch(err =>{ this.errors = err.response.data.errors;
                     this.loadingButton = false;
                         Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            text: '.من فضلك ادخل جميع البيانات المطلوبه',
                            showConfirmButton: true,
                            timer: 2000
                            });

                });

               }else{
                      axios.post(`/en/apitasks`,{ addtaskForm: this.addtaskForm, projectId}).then(res => {
                            this.addTaskVisible = false;
                           this.loadingButton = false;

                             Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Task has been Created successfully.',
                                showConfirmButton: true,
                                timer: 2000
                                });
                                this.clearData();
                                  this.getProjectsAfterAdd();
                    }
                ).catch(err =>{ this.errors = err.response.data.errors
                     this.loadingButton = false;
                 Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                text: 'Please enter all the required information.',
                                showConfirmButton: true,
                                timer: 2000
                        });


                });
               }
             },

            edittask(row){
                this.editTaskVisible = true;
                this.addtaskForm = row;
            },


 updateTask(row){
        var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

       if(Lang =='ar'){
          axios.put(`/ar/apitasks/${row}`,this.addtaskForm ).then(res => {
                this.editProjectVisible = false;
                  this.loadingButton = false;
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'تم تعديل المهمة بنجاح, شكراً لك',
                    timer: 1800,
                    });
                        // this.clearData();
                        this.editTaskVisible = false;
                        this.addtaskForm = {};
                        }
                ).catch(err =>{ this.errors = err.response.data.errors;
                     this.loadingButton = false;
                        this.editTaskVisible = false,
                         Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            text: '.من فضلك ادخل جميع البيانات المطلوبه',
                            timer: 2000,
                            });

                });

               }else{
                   axios.put(`/ar/apitasks/${row}`,this.addtaskForm).then(res => {
                          this.editProjectVisible = false;
                           this.loadingButton = false;
                             Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Task has been updated successfully.',
                                timer: 2000
                                });
                                  this.editTaskVisible = false;
                                  this.addtaskForm = {};
                    }
                ).catch(err =>{ this.errors = err.response.data.errors
                     this.loadingButton = false;
                      this.editTaskVisible = false;
                 Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                text: 'Please enter all the required information.',
                                editTaskVisible: true,
                                timer: 2000
                        });


                });
               }

    },

    handleDeleteTask( row) {
            console.log( row);
         var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
         if(Lang =='ar'){

                  this.$confirm('هل انت متاكد من رغبتك في حذف المشروع', 'تنبيه', {
                            confirmButtonText: 'حذف',
                            cancelButtonText: 'الغاء',
                            type: ''
                            }).then(() => {

                                axios.delete(`/ar/apitasks/${row.id}`).then(res => {

                                            this.$notify({
                                                title: 'نجاح',
                                                message: 'تم حذف المهمة بنجاح',
                                                type: 'success'
                                                });
                                        this.getProjects();
                                        this.handleShow();
                                        }).catch(err => console.log(err));
                            }).catch(() => {
                            this.$message({
                                type: 'info',
                                message: 'تم الغاء الحذف  '
                            });
                            });
                        }

                else{
                this.$confirm('Are you Sure You Wand Delete this Task', 'Warning', {
                                        confirmButtonText: 'OK',
                                        cancelButtonText: 'Cancel',
                                        type: 'warning'
                                        }).then(() => {

                                            axios.delete(`/en/apitasks/${row.id}`).then(res => {

                                                        this.$notify({
                                                            title: 'Success',
                                                            message: 'Task Deleted Successfully',
                                                            type: 'success'
                                                            });
                                                    this.getProjects();
                                                    }).catch(err => console.log(err));

                                        }).catch(() => {
                                        this.$message({
                                            type: 'info',
                                            message: 'Delete canceled'
                                        });
                                        });
                                    }
                },


    handleShow(index, row) {

            this.toggletable = false;
            this.TasksForm = row; console.log(index, row);

      },
     handleDelete(index, row) {
            console.log(index, row);
         var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
         if(Lang =='ar'){

                  this.$confirm('هل انت متاكد من رغبتك في حذف المشروع', 'تنبيه', {
                            confirmButtonText: 'حذف',
                            cancelButtonText: 'الغاء',
                            type: ''
                            }).then(() => {

                                axios.delete(`/ar/apiprojects/${row.id}`).then(res => {

                                            this.$notify({
                                                title: 'نجاح',
                                                message: 'تم حذف المشروع بنجاح',
                                                type: 'success'
                                                });
                                        this.getProjects();
                                        }).catch(err => console.log(err));
                            }).catch(() => {
                            this.$message({
                                type: 'info',
                                message: 'تم الغاء الحذف  '
                            });
                            });
                        }

                else{
                this.$confirm('Are you Sure You Wand Delete this project', 'Warning', {
                                        confirmButtonText: 'OK',
                                        cancelButtonText: 'Cancel',
                                        type: 'warning'
                                        }).then(() => {

                                            axios.delete(`/en/apiprojects/${row.id}`).then(res => {

                                                        this.$notify({
                                                            title: 'Success',
                                                            message: 'project Deleted Successfully',
                                                            type: 'success'
                                                            });
                                                    this.getProjects();
                                                    }).catch(err => console.log(err));

                                        }).catch(() => {
                                        this.$message({
                                            type: 'info',
                                            message: 'Delete canceled'
                                        });
                                        });
                                    }
                },

   getProjectsAfterAdd(){
            axios.get('/ar/apiprojects').then(res =>  {

            this.allProjects = res.data;
            console.log( this.allProjects);})
             .catch(err => { console.log(err)});

        },

     getProjects(){
            this.loadingupdate = true;
            axios.get('/ar/apiprojects').then(res =>  {

            this.allProjects = res.data;
            this.loadingupdate = false;
            console.log( this.allProjects);})
             .catch(err => { console.log(err)});
        },
    getResults(page = 1) {
                    axios.get('/ar/apiprojects?page=' + page)
                        .then(response => {
                            this.allProjects  = response.data ;
                            //  console.log('dd',response.data);
                                               });
                },



    querySearch(queryString, cb) {
        var links = this.links;
        var results = queryString ? links.filter(this.createFilter(queryString)) : links;
        // call callback function to return suggestion objects
        cb(results);
      },
        createFilter(queryString) {
        return (link) => {
          return (link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
        };

      },
       loadAll() {
        return [
        { "value": "كل المحافظات"  },
          { "value": "القاهرة"  },
          { "value": "الإسكندرية" },
          { "value": "بورسعيد" },
          { "value": "الأقصر" },
          { "value": "قنا" },
          { "value": "سوهاج" },
          { "value": "الجيزة" },
        { "value": "الدقهلية" },
        { "value": "دمياط" },
        { "value": "كفر الشيخ" },
        { "value": "السويس" },
        { "value": "الغربية" },
        { "value": "الفيوم" },
        { "value": "المنوفية" },
        { "value": "مطروح" },
        { "value": "الوادي الجديد" },
        { "value": "المنيا" },
        { "value": "أسوان" },
        { "value": "البحيرة" },
        { "value": "بني سويف" },
        { "value": "الإسماعيلية" },
        { "value": "أسيوط" },
        { "value": "شمال سيناء" },
        { "value": "جنوب سيناء" },
        { "value": "البحر الأحمر" },
         ];
      },
        handleSelectProvinces(item) {

        // console.log(item.value);
         axios.post('searchProvinces',{'Provinces' : item.value } ).then(res => {
                this.allfiltehCase = res.data;
                }).catch(err => this.errors = err.response.data.errors);
              },

  handleClose(done) {
    var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
    if(Lang == 'ar' ){
        this.$confirm('هل انت متاكد من الاغلاق؟')
          .then(_ => {
            done();
          })
          .catch(_ => {});
      }else{
          this.$confirm('Are you sure to close this dialog?')
          .then(_ => {
            done();
             this.addtaskForm = {};
          })
          .catch(_ => {});
      }
      },
         userPermissions(){
         axios.get('userPermissions').then(res => { this.user_Permissions = res.data;
         console.log('userPermissions',this.user_Permissions);
         }).catch(err =>{ console.log(err); });
        },
        getProvinces(){
         axios.get('Provinces').then(res => { this.Provinces = res.data; console.log( res.data);
         }).catch(err =>{ console.log(err); });

       },

         clearData(){
            //   alert('dddds');
            this.addtaskForm = {};
            this.errors = {};
            this.addprojectForm = {};

        },

    },
    created(){
       this.getProjects();
       this.getProvinces();
       this.userPermissions();
    }
  }
</script>

