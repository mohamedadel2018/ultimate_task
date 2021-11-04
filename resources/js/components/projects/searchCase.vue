<template>
<div>


      <section class="content" >
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-purple">
                      <div class="card-header">
                            <h3 class="card-title-rtl"> {{ $trans('app.case_search_registration') }}</h3>
                      </div>

                       <div class="card-body">

                           <!-- start contect from here -->
                           <h5  class="text-center ">    <el-avatar size='large' src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/256x256/users_family.png"></el-avatar> </h5>

                            <h5  class="text-center mb-4"> <i class="el-icon-loading"></i> {{ $trans('app.case_research_form') }}</h5>
                  <!-- start table -->

                     <el-tabs type="border-card" :stretch="true"    v-loading="loadingForm"   :element-loading-text="$trans('app.Loading')"
                                @tab-click="handleClick">
                    <el-tab-pane label="البيانات التعريفية">
                      <span slot="label"><i class="el-icon-date"></i> {{ $trans('app.metadata') }} </span>
                           <!-- strat content for  case_search_registration-->
                          <div class="col-md-12">
                          <div class="row mt-4">
                            <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.date') }}</span>
                                    <el-date-picker
                                      v-model="form.date"
                                      value-format="yyyy-MM-dd"
                                      type="date"
                                      format="yyyy-MM-dd"
                                      placeholder="ادخل التاريخ">
                                    </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date']">
                                      {{errors['form.date'][0]}}
                                  </span>
                              </div>
                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.Provinces') }}</span>
                                  <el-select v-model="form.Provinces" placeholder="المحافظة">
                                    <el-option
                                      v-for="Province in Provinces.Provinces"
                                      :key="Province.id"
                                      :label="Province.name"
                                      :value="Province.name">
                                    </el-option>
                                  </el-select>
                                    <span class="text-danger" v-if="errors['form.Provinces']">
                                      {{errors['form.Provinces'][0]}}
                                  </span>
                                </div>
                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.zone') }}</span>
                                  <el-input placeholder="المنطقة" v-model="form.zone"></el-input>
                                    <span class="text-danger" v-if="errors['form.zone']">
                                      {{errors['form.zone'][0]}}
                                  </span>
                                </div>
                                  <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.Village') }}</span>
                                  <el-input placeholder="القرية/الشياخة" v-model="form.Village"></el-input>
                                    <span class="text-danger" v-if="errors['form.Village']">
                                      {{errors['form.Village'][0]}}
                                  </span>
                                </div>
                                  <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.respondent_name') }}</span>
                                  <el-input placeholder="اسم المستجيب" v-model="form.respondent_name"></el-input>
                                    <span class="text-danger" v-if="errors['form.respondent_name']">
                                      {{errors['form.respondent_name'][0]}}
                                  </span>
                                </div>
                                  <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.family_name') }}</span>
                                  <el-input placeholder="اسم العائل" v-model="form.family_name"></el-input>
                                    <span class="text-danger" v-if="errors['form.family_name']">
                                      {{errors['form.family_name'][0]}}
                                  </span>
                                </div>
                                <div class="col-md-6 mt-4">
                                  <span class="demonstration block">{{ $trans('app.address') }}</span>
                                  <el-input placeholder="العنوان بالتفاصيل" v-model="form.address"></el-input>
                                    <span class="text-danger" v-if="errors['form.address']">
                                      {{errors['form.address'][0]}}
                                  </span>
                                </div>
                          </div>
                          <div class="row mt-4">
                              <span class="demonstration">{{ $trans('app.phone_number') }}</span>
                                  <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.phone') }}</span>
                                  <el-input  size="small" type="number" placeholder="الموبيل المحمول" v-model="form.phone"></el-input>
                                    <span class="text-danger" v-if="errors['form.phone']">
                                      {{errors['form.phone'][0]}}
                                  </span>
                                </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.phone_home') }}</span>
                                  <el-input size="small" type="number" placeholder="رقم التليفون المنزلي" v-model="form.phone_home"></el-input>
                                    <span class="text-danger" v-if="errors['form.phone_home']">
                                      {{errors['form.phone_home'][0]}}
                                  </span>
                                </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.family_number') }}</span>
                                  <el-input size="small" type="number" maxlength='10'   show-word-limit placeholder="يتكون من خمس ارقام" v-model="form.family_number"></el-input>
                                    <span class="text-danger" v-if="errors['form.family_number']">
                                      {{errors['form.family_number'][0]}}
                                  </span>
                                </div>
                                  </div>
                                  <hr>
                    <!-- start researcher visits -->
                             <u>  <h5 class="text-center mb-4"> {{ $trans('app.researcher_visits') }}</h5></u>
                              <div class="row" >
                               <div class="col-md-1"></div>
                              <div class="col-md-10">
                                 <el-tabs type="border-card"   :stretch="true" v-model="activeName" @tab-click="handleClick">
                                  <el-tab-pane  name="first">
                                <span slot="label"><i class="el-icon-s-claim"></i> {{ $trans('app.first_visit') }} </span>

                                <div class="row">
                                 <div class="col-md-2 mt-4">
                                    <span class="demonstration block">{{ $trans('app.date') }}</span>
                                    <el-date-picker
                                      v-model="form.date_visit1"
                                      type="date"
                                      value-format="yyyy-MM-dd"
                                      placeholder="تاريخ الزيارة الاولي"
                                      format="yyyy/MM/dd">
                                    </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date_visit1']">
                                      {{errors['form.date_visit1'][0]}}
                                  </span>
                                  </div>
                                </div>
                               <div class="row">
                                  <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.team') }}</span>
                                    <el-input placeholder="" v-model="form.team1"></el-input>
                                  <span class="text-danger" v-if="errors['form.team1']">
                                      {{errors['form.team1'][0]}}
                                  </span>
                                  </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.researcher') }}</span>
                                  <el-select v-model="form.researcher1" placeholder="اسم الباحث">
                                    <el-option
                                      v-for="user in Provinces.users"
                                      :key="user.id"
                                      :label="user.first_name + ' ' + user.last_name "
                                      :value="user.id">
                                      {{user.first_name }} {{user.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.researcher']">
                                      {{errors['form.researcher'][0]}}
                                  </span>
                                </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.Supervisor') }}</span>
                                  <el-select v-model="form.Supervisors1" placeholder="اسم المشرف">
                                    <el-option
                                      v-for="Supervisor in Provinces.Supervisors"
                                      :key="Supervisor.id"
                                      :label="Supervisor.first_name + ' ' + Supervisor.last_name"
                                      :value="Supervisor.id">
                                      {{Supervisor.first_name }} {{Supervisor.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Supervisor']">
                                      {{errors['form.Supervisor'][0]}}
                                  </span>
                                </div>
                               </div>
                                <div class="row">
                                  <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.result') }}</span>
                                   <el-select v-model="form.result1" placeholder="Select">
                                      <el-option
                                        v-for="item in results"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                      </el-option>
                                    </el-select>
                                    <span class="text-danger" v-if="errors['form.result1']">
                                        {{errors['form.result1'][0]}}
                                    </span>
                                  </div>
                                   <div class="col-md-5 mt-4"  v-if="form.result == '٩'">
                                     <span class="demonstration block">{{ $trans('app.anther_result') }}</span>
                                     <el-input size="small" placeholder="السبب الاخر" v-model="form.anther_result1"></el-input>
                                    <span class="text-danger" v-if="errors['form.anther_result1']">
                                      {{errors['form.anther_result1'][0]}}
                                    </span>
                                    </div>
                                </div>

                                <div class=" mt-4">
                                    <span class="demonstration block">{{ $trans('app.next_visit') }}</span>
                              </div>
                                   <div class="col-md-5 mt-2">
                                      <el-date-picker
                                        v-model="form.date_next_visit1"
                                        type="datetime"
                                        value-format="yyyy-MM-dd HH:mm:ss"
                                        placeholder="اختر التاريخ والوقت"
                                        format="yyyy/MM/dd HH:mm:ss"
                                        >
                                      </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date_next_visit1']">
                                      {{errors['form.date_next_visit1'][0]}}
                                  </span>
                                  </div>


                                  </el-tab-pane>
                                  <el-tab-pane label="Config" name="second">
                                    <!-- strat visit two -->
                              <span slot="label"><i class="el-icon-s-claim"></i> {{ $trans('app.second_visit') }} </span>

                                <div class="row">
                                 <div class="col-md-2 mt-4">
                                    <span class="demonstration block">{{ $trans('app.date') }}</span>
                                    <el-date-picker
                                      v-model="form.date_visit2"
                                      type="date"
                                      value-format="yyyy-MM-dd HH:mm:ss"
                                      placeholder="تاريخ الزيارة الثانية"
                                      format="yyyy/MM/dd HH:mm:ss">
                                    </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date2']">
                                      {{errors['form.date2'][0]}}
                                  </span>
                                  </div>
                                </div>
                               <div class="row">
                                  <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.team') }}</span>
                                    <el-input placeholder="" v-model="form.team2"></el-input>
                                  <span class="text-danger" v-if="errors['form.team2']">
                                      {{errors['form.team2'][0]}}
                                  </span>
                                  </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.researcher') }}</span>
                                  <el-select v-model="form.researcher2" placeholder="اسم الباحث">
                                    <el-option
                                      v-for="user in Provinces.users"
                                      :key="user.id"
                                      :label="user.email"
                                      :value="user.id">
                                      {{user.first_name }} {{user.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.researcher2']">
                                      {{errors['form.researcher2'][0]}}
                                  </span>
                                </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.Supervisor') }}</span>
                                  <el-select v-model="form.Supervisors2" placeholder="اسم المشرف">
                                    <el-option
                                      v-for="Supervisor in Provinces.Supervisors"
                                      :key="Supervisor.id"
                                      :label="Supervisor.first_name + ' ' + Supervisor.last_name"
                                      :value="Supervisor.id">
                                      {{user.first_name }} {{user.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Supervisor2']">
                                      {{errors['form.Supervisor2'][0]}}
                                  </span>
                                </div>
                               </div>
                                <div class="row">
                                  <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.result') }}</span>
                                   <el-select v-model="form.result2" placeholder="Select">
                                      <el-option
                                        v-for="item in results"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                      </el-option>
                                    </el-select>
                                    <span class="text-danger" v-if="errors['form.result2']">
                                        {{errors['form.result2'][0]}}
                                    </span>
                                  </div>
                                   <div class="col-md-5 mt-4"  v-if="form.result2 == '٩'">
                                     <span class="demonstration block">{{ $trans('app.anther_result') }}</span>
                                     <el-input size="small" placeholder="السبب الاخر" v-model="form.anther_result2"></el-input>
                                    <span class="text-danger" v-if="errors['form.anther_result2']">
                                      {{errors['form.anther_result2'][0]}}
                                  </span>
                                    </div>

                                     </div>

                                 <div class="mt-4">
                                 <span class="demonstration block">{{ $trans('app.next_visit') }}</span>
                                 </div>
                                   <div class="col-md-5 mt-2">
                                      <el-date-picker
                                        v-model="form.date_next_visit2"
                                        type="datetime"
                                        placeholder="اختر التاريخ والوقت"
                                       >
                                      </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date_next_visit2']">
                                      {{errors['form.date_next_visit2'][0]}}
                                  </span>
                                  </div>



                                  </el-tab-pane>
                                  <el-tab-pane label="Role" name="third">
                           <!-- strat visit Third -->
                              <span slot="label"><i class="el-icon-s-claim"></i> {{ $trans('app.Third_visit') }} </span>

                                <div class="row">
                                 <div class="col-md-2 mt-4">
                                    <span class="demonstration block">{{ $trans('app.date') }}</span>
                                    <el-date-picker
                                      v-model="form.date_visit3"
                                      type="date"
                                      value-format="yyyy-MM-dd"
                                      placeholder="تاريخ الزيارة الثالثة"
                                      format="yyyy/MM/dd">
                                    </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date3']">
                                      {{errors['form.date3'][0]}}
                                  </span>
                                  </div>
                                </div>
                               <div class="row">
                                  <div class="col-md-3 mt-4">
                                    <span class="demonstration">{{ $trans('app.team') }}</span>
                                    <el-input placeholder="" v-model="form.team3"></el-input>
                                  <span class="text-danger" v-if="errors['form.team3']">
                                      {{errors['form.team3'][0]}}
                                  </span>
                                  </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.researcher') }}</span>
                                  <el-select v-model="form.researcher3" placeholder="اسم الباحث">
                                    <el-option
                                      v-for="user in Provinces.users"
                                      :key="user.id"
                                      :label="user.email"
                                      :value="user.id">
                                      {{user.first_name }} {{user.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.researcher3']">
                                      {{errors['form.researcher3'][0]}}
                                  </span>
                                </div>

                                <div class="col-md-3 mt-4">
                                  <span class="demonstration block">{{ $trans('app.Supervisor') }}</span>
                                  <el-select v-model="form.Supervisors3" placeholder="اسم المشرف">
                                    <el-option
                                      v-for="Supervisor in Provinces.Supervisors"
                                      :key="Supervisor.id"
                                      :label="Supervisor.email"
                                      :value="Supervisor.id">
                                      {{user.first_name }} {{user.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Supervisor3']">
                                      {{errors['form.Supervisor3'][0]}}
                                  </span>
                                </div>
                               </div>
                                <div class="row">
                                  <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.result') }}</span>
                                   <el-select v-model="form.result3" placeholder="Select">
                                      <el-option
                                        v-for="item in results"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                      </el-option>
                                    </el-select>
                                    <span class="text-danger" v-if="errors['form.result3']">
                                        {{errors['form.result3'][0]}}
                                    </span>
                                  </div>

                                   <div class="col-md-5 mt-4"  v-if="form.result3 == '٩'">
                                     <span class="demonstration block">{{ $trans('app.anther_result') }}</span>
                                     <el-input size="small" placeholder="السبب الاخر" v-model="form.anther_result3"></el-input>
                                    <span class="text-danger" v-if="errors['form.anther_result3']">
                                      {{errors['form.anther_result3'][0]}}
                                  </span>
                                  </div>
                              </div>
                                  </el-tab-pane>
                                </el-tabs>
                            </div>
                            <div class="col-md-5 mt-4">
                              {{ $trans('app.Total_number_visits') }}
                          <el-input-number v-model="form.Total_number_visits" @change="handleChange" :min="1" :max="3"></el-input-number>
                            </div>
                            </div>

                            <hr>
                            <!-- start final visit -->
                      <u><h5 class="text-center mb-4"> {{ $trans('app.Final_visit') }}</h5></u>
                        <div class="row">
                            <span class="demonstration block">{{ $trans('app.date') }}</span>
                          <div class="col-md-2 mt-2">

                                    <el-date-picker
                                      v-model="form.date_Final_visit"
                                      type="date"
                                      placeholder="اليوم"
                                      value-format="dd"
                                      format="dd">
                                    </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date_Final_visit']">
                                      {{errors['form.date_Final_visit'][0]}}
                                  </span>
                          </div>
                         <div class="col-md-2 mt-2">
                                        <el-date-picker
                                          v-model="form.month_Final_visit"
                                          type="month"
                                          format="MM"
                                          value-format="MM"
                                          placeholder="الشهر">
                                        </el-date-picker>
                                    <span class="text-danger" v-if="errors['form.date_Final_visit']">
                                      {{errors['form.date_Final_visit'][0]}}
                                  </span>
                          </div>
                           <div class="col-md-5 mt-2">
                                <el-date-picker
                                  v-model="form.year_Final_visit"
                                  type="year"
                                  value-format="yyyy"
                                  placeholder="السنة">
                                </el-date-picker>
                           </div>
                           <div class="col-md-5 mt-4">
                                    <span class="demonstration block">{{ $trans('app.team') }}</span>
                                    <el-input placeholder="" v-model="form.team_Final_visit"></el-input>
                                  <span class="text-danger" v-if="errors['form.team_Final_visit']">
                                      {{errors['form.team_Final_visit'][0]}}
                                  </span>
                            </div>

                                <div class="col-md-5 mt-4">
                                  <span class="demonstration block">{{ $trans('app.researcher') }}</span>
                                  <el-select v-model="form.researcher_Final_visit" placeholder="اسم الباحث">
                                    <el-option
                                      v-for="user in Provinces.users"
                                      :key="user.id"
                                      :label="user.first_name + ' ' + user.last_name"
                                      :value="user.id">
                                      {{user.first_name }} {{user.last_name }}
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.researcher_Final_visit']">
                                      {{errors['form.researcher_Final_visit'][0]}}
                                  </span>
                                </div>

                                 <div class="col-md-3 mt-4">
                                    <span class="demonstration block">{{ $trans('app.result') }}</span>
                                   <el-select v-model="form.result_Final_visit" placeholder="Select">
                                      <el-option
                                        v-for="item in results"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                      </el-option>
                                    </el-select>
                                    <span class="text-danger" v-if="errors['form.result_Final_visit']">
                                        {{errors['form.result_Final_visit'][0]}}
                                    </span>
                                  </div>

                                   <div class="col-md-7 mt-4"  v-if="form.result_Final_visit == '٩'">
                                     <span class="demonstration block">{{ $trans('app.anther_result') }}</span>
                                     <el-input size="small" placeholder="السبب الاخر" v-model="form.result_Final_visit_anther"></el-input>
                                    <span class="text-danger" v-if="errors['form.result_Final_visit_anther']">
                                      {{errors['form.result_Final_visit_anther'][0]}}
                                  </span>
                                  </div>
                        </div>
                        <div class="row">
                              <div class="col-md-7 mt-4">
                                 <span class="demonstration block">{{ $trans('app.add_image') }}</span> <br>
                                <input class="mt-2"  id="upload-file" type="file"  @change="processFile($event)" multiple>
                                  <div   class="avatar img-fluid img-circle" style="margin-top:10px">
                                     <!-- {{form.image == ''}} -->
                                    <img v-show="form.image != ''" :src="get_avatar()" v-bind:style="form.styleObject" class="image-live" />
                                 </div>
                                <span class="text-danger" v-if="errors['form.image']">
                                {{errors['form.image'][0]}}
                                </span>

                                <span class="lead" >
                                  <p style="font-size:15px"> {{ $trans('app.dec1_image') }}  <br>
                                  {{ $trans('app.dec2_image') }} </p>
                                </span>
                              </div>

                        </div>

                            </div>


                       <!-- End content for  case_search_registration -->
              </el-tab-pane>
            <!-- start characteristics family members -->
              <el-tab-pane  label="Config">
                <span slot="label"><i class="el-icon-data-line"></i>  {{ $trans('app.characteristics_family_members') }}  </span>

                   <p class="mb-4" >{{ $trans('app.Family_members') }}</p>


              <el-collapse   v-model="activeNames" @change="handleChange">

               <el-collapse-item  v-for="(search_registration,k) in search_registrations" :key="k"  :name="k" >  <!--  start for person one -->
                <template slot="title" class="row">
                    <div class="col-md-5">
                          {{ $trans('app.person') }} {{k + 1}}  <i class="el-icon-user-solid mr-2"></i>
                    </div>
                     <div class="col-md-6">
                        <div class=" d-flex justify-content-end">
                            <i class="el-icon-remove text-danger text-lg ml-2"  @click="remove(k)" :title="$trans('app.remove')"  v-show="k || ( !k && search_registrations.length > 1)" ></i>
                             <i class="el-icon-circle-plus  text-success text-lg" @click="add(k)" :title="$trans('app.add')"  v-show="k == search_registrations.length-1" ></i>
                        </div>
                     </div>
                </template>
                <div class="row mt-4">
                       <div class="col-md-3">
                         <span class="demonstration block ">{{ $trans('app.name') }} (١٠١)  </span>
                            <el-input size='small'   placeholder="الاسم" v-model="search_registration.family_person_name1" clearable></el-input>
                            <span class="text-danger" v-if="errors['search_registrations.family_person_name1']">
                            {{errors['search_registrations.family_person_name1'][0]}}
                          </span>
                      </div>

                       <div class="col-md-3">
                       <span class="demonstration block">{{ $trans('app.Relationship_head_family') }} (١٠٢)</span>
                        <el-select size="small" v-model="search_registration.Relationship_head_family1" placeholder="اختر الصله">
                          <el-option
                            v-for="Relationship_head_family in Relationship_head_familys"
                            :key="Relationship_head_family.value"
                            :label="Relationship_head_family.label"
                            :value="Relationship_head_family.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Relationship_head_family1']">
                            {{errors['search_registrations.Relationship_head_family1'][0]}}
                        </span>
                      </div>
                      <div class="col-md-4 "  v-if="search_registration.Relationship_head_family1 == '٧'">
                          <span class="demonstration block">{{ $trans('app.anther_result') }}</span>
                          <el-input size="small" placeholder="اكتب الصله الأخري" v-model="search_registration.Relationship_head_family1_anther" clearable></el-input>
                          <span class="text-danger" v-if="errors['search_registrations.Relationship_head_family1_anther']">
                            {{errors['search_registrations.Relationship_head_family1_anther'][0]}}
                        </span>
                      </div>

                        <div class="col-md-3">
                       <span class="demonstration block">{{ $trans('app.Gender') }} (١٠٣)</span>
                        <el-select size="small" v-model="search_registration.Gender1" placeholder="اختر النوع" clearable>
                          <el-option
                            v-for="Gender in Genders"
                            :key="Gender.value"
                            :label="Gender.label"
                            :value="Gender.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Gender1']">
                            {{errors['search_registrations.Gender1'][0]}}
                        </span>
                      </div>
                </div>

                <div class="row">
                      <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.education') }} (١٠٤)</span>
                        <el-select  v-model="search_registration.education1" placeholder="اختر التعليم" >
                          <el-option
                            v-for="education in educations"
                            :key="education.value"
                            :label="education.label"
                            :value="education.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.education1']">
                            {{errors['search_registrations.education1'][0]}}
                        </span>
                      </div>

                      <div class="col-md-3 mt-2" v-if="search_registration.education1 == '٢' || search_registration.education1 == '٣' || search_registration.education1 == '٥' ">
                       <span class="demonstration block">{{ $trans('app.leave_education') }} (١٠٥)</span>
                        <el-select multiple  v-model="search_registration.leave_education1" placeholder="(يسمح بتعدد الاختيارات)" >
                          <el-option
                            v-for="education in leave_educations_and_Why_dont_agree_educations"
                            :key="education.value"
                            :label="education.label"
                            :value="education.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.leave_education1']">
                            {{errors['search_registrations.leave_education1'][0]}}
                        </span>
                      </div>
                       <div class="col-md-4 mt-2"  v-if="search_registration.leave_education1 == 'X'">
                          <span class="demonstration block">{{ $trans('app.anther_result') }}</span>
                          <el-input size="small" placeholder="اكتب السبب الأخر" v-model="search_registration.leave_education1_anther" clearable Required></el-input>
                          <span class="text-danger" v-if="errors['search_registrations.leave_education1_anther']">
                            {{errors['search_registrations.leave_education1_anther'][0]}}
                        </span>
                      </div>

                  <div class="col-md-4 mt-2"  v-if="search_registration.education1 == '٢' || search_registration.education1 == '٣' || search_registration.education1 == '٥' ">
                       <span class="demonstration block">{{ $trans('app.If_there_opportunity_for_education') }} (١٠٦)</span>
                        <el-select   v-model="search_registration.If_there_opportunity_for_educations1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="opportunity_education in yesOrno"
                            :key="opportunity_education.value"
                            :label="opportunity_education.label"
                            :value="opportunity_education.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.If_there_opportunity_for_educations1']">
                            {{errors['search_registrations.If_there_opportunity_for_educations1'][0]}}
                        </span>
                    </div>

                  <div class="col-md-4 mt-2" v-if="search_registration.If_there_opportunity_for_educations1 == '٢'">
                       <span class="demonstration block">{{ $trans('app.Why_dont_agree_education') }} (١٠٧) </span>
                        <el-select  multiple v-model="search_registration.Why_dont_agree_education1" placeholder="(يسمح بتعدد الاختيارات)" >
                          <el-option
                            v-for="Why_dont_agree_education in leave_educations_and_Why_dont_agree_educations"
                            :key="Why_dont_agree_education.value"
                            :label="Why_dont_agree_education.label"
                            :value="Why_dont_agree_education.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Why_dont_agree_education1']">
                            {{errors['search_registrations.Why_dont_agree_education1'][0]}}
                        </span>
                  </div>

                  <div class="col-md-3 mt-2"  v-if="search_registration.education1 == '٢' || search_registration.education1 == '٣' || search_registration.education1 == '٥' ">
                       <span class="demonstration block">{{ $trans('app.Social_status') }} (١٠٨) </span>
                        <el-select  v-model="search_registration.Social_status1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="Social_status in Social_statuss"
                            :key="Social_status.value"
                            :label="Social_status.label"
                            :value="Social_status.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Social_status1']">
                            {{errors['search_registrations.Social_status1'][0]}}
                        </span>
                  </div>
                  <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.work') }} (١٠٩)</span>
                        <el-select  v-model="search_registration.work1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="work in works"
                            :key="work.value"
                            :label="work.label"
                            :value="work.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.search_registration.work1']">
                            {{errors['search_registrations.search_registration.work1'][0]}}
                        </span>
                  </div>

                   <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.nature_work_situation') }} (١١٠) </span>
                        <el-select  v-model="search_registration.nature_work_situation1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="nature_work_situation in nature_work_situations"
                             :key="nature_work_situation.value"
                            :label="nature_work_situation.label"
                            :value="nature_work_situation.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.nature_work_situation1']">
                            {{errors['search_registrations.nature_work_situation1'][0]}}
                        </span>
                  </div>
                </div>
                                      <!-- start div for question about nature_work_situation -->
              <div class="row" v-if="search_registration.nature_work_situation1 !==  '٥'  && search_registration.nature_work_situation1 !==  '٦'">
                    <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.regularity_at_work') }} (١١١) </span>
                        <el-select  v-model="search_registration.regularity_at_work1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="regularity_at_work in regularity_at_works"
                             :key="regularity_at_work.value"
                            :label="regularity_at_work.label"
                            :value="regularity_at_work.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.regularity_at_work1']">
                            {{errors['search_registrations.regularity_at_work1'][0]}}
                        </span>
                  </div>

                   <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.business_sector') }} (١١٢)</span>
                        <el-select  v-model="search_registration.business_sector1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="business_sector in business_sectors"
                             :key="business_sector.value"
                            :label="business_sector.label"
                            :value="business_sector.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.business_sector1']">
                            {{errors['search_registrations.business_sector1'][0]}}
                        </span>
                  </div>
                  <div class="col-md-4 mt-2"  v-if="search_registration.business_sector1 == '٤'">
                    <span class="demonstration block">{{ $trans('app.anther_result') }} </span>
                    <el-input size="small" placeholder="اكتب قطاع العمل الأخر" v-model="search_registration.business_sector1_anther" clearable Required></el-input>
                    <span class="text-danger" v-if="errors['search_registrations.business_sector1_anther']">
                      {{errors['search_registrations.business_sector1_anther'][0]}}
                  </span>
                </div>

                  <div class="col-md-4 mt-2">
                       <span class="demonstration block">{{ $trans('app.person_main_occupation') }} (١١٣) </span>
                         <el-input   type="textarea"   :rows="1" size="larg" placeholder="أذكر المهنة بالتفصيل" v-model="search_registration.person_main_occupation1" clearable Required></el-input>
                        <span class="text-danger" v-if="errors['search_registrations.person_main_occupation1']">
                            {{errors['search_registrations.person_main_occupation1'][0]}}
                        </span>
                  </div>


                    <div class="col-md-3 mt-4">
                       <span class="demonstration block">{{ $trans('app.sector_economic_activity') }} (١١٤) </span>
                        <el-select  v-model="search_registration.sector_economic_activity1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="sector_economic_activity in sector_economic_activitys"
                             :key="sector_economic_activity.value"
                            :label="sector_economic_activity.label"
                            :value="sector_economic_activity.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.sector_economic_activity1']">
                            {{errors['search_registrations.sector_economic_activity1'][0]}}
                        </span>
                  </div>

                  <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.other_practical_skills') }} (١١٥) </span>
                        <el-select  v-model="search_registration.other_practical_skills1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="other_practical_skill in yesOrno"
                             :key="other_practical_skill.value"
                            :label="other_practical_skill.label"
                            :value="other_practical_skill.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.other_practical_skills1']">
                            {{errors['search_registrations.other_practical_skills1'][0]}}
                        </span>
                  </div>
            </div>     <!-- End div for question about nature_work_situation -->


            <div class="row" v-if="search_registration.other_practical_skills1 !== '٢'">

                  <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.What_are_practical_skills') }} (١١٦) </span>
                        <el-select  v-model="search_registration.What_are_practical_skills1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="What_are_practical_skill in What_are_practical_skills"
                             :key="What_are_practical_skill.value"
                            :label="What_are_practical_skill.label"
                            :value="What_are_practical_skill.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.What_are_practical_skills1']">
                            {{errors['search_registrations.What_are_practical_skills1'][0]}}
                        </span>
                  </div>
                    <div class="col-md-4 mt-2"  v-if="search_registration.What_are_practical_skills1 == 'X'">
                    <span class="demonstration block">{{ $trans('app.anther_result') }} </span>
                    <el-input size="small" placeholder="اكتب المهارة الاخري" v-model="search_registration.What_are_practical_skills1_anther" clearable Required></el-input>
                    <span class="text-danger" v-if="errors['search_registrations.What_are_practical_skills1_anther']">
                      {{errors['search_registrations.What_are_practical_skills1_anther'][0]}}
                  </span>
                </div>

                <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.Social_Security') }} (١١٧) </span>
                        <el-select  v-model="search_registration.Social_Security1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="Social in Social_Security"
                             :key="Social.value"
                            :label="Social.label"
                            :value="Social.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Social_Security1']">
                            {{errors['search_registrations.Social_Security1'][0]}}
                        </span>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.health_insurance') }} (١١٨) </span>
                        <el-select  v-model="search_registration.health_insurance1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="health_insurance in health_insurances"
                             :key="health_insurance.value"
                            :label="health_insurance.label"
                            :value="health_insurance.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.health_insurance1']">
                            {{errors['search_registrations.health_insurance1'][0]}}
                        </span>
                </div>

                  <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.chronic_diseases') }} (١١٩) </span>
                        <el-select  v-model="search_registration.chronic_diseases1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="chronic_diseases in yesOrno"
                             :key="chronic_diseases.value"
                            :label="chronic_diseases.label"
                            :value="chronic_diseases.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.chronic_diseases1']">
                            {{errors['search_registrations.chronic_diseases1'][0]}}
                        </span>
                </div>
            </div>
             <div class="row" v-if="search_registration.chronic_diseases1 == '١'">

                  <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.Define_chronic_disease') }} (١٢٠) </span>
                        <el-select  v-model="search_registration.Define_chronic_disease1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="Define_chronic_disease in Define_chronic_diseases"
                             :key="Define_chronic_disease.value"
                            :label="Define_chronic_disease.label"
                            :value="Define_chronic_disease.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Define_chronic_disease1']">
                            {{errors['search_registrations.Define_chronic_disease1'][0]}}
                        </span>
                </div>
                <div class="col-md-4 mt-2"  v-if="search_registration.Define_chronic_disease1 == 'X'">
                    <span class="demonstration block">{{ $trans('app.anther_result') }} </span>
                    <el-input size="small" placeholder="اكتب المرض الاخر" v-model="search_registration.Define_chronic_disease1_anther" clearable Required></el-input>
                    <span class="text-danger" v-if="errors['search_registration.What_are_practical_skills1_anther']">
                      {{errors['search_registration.What_are_practical_skills1_anther'][0]}}
                  </span>
                </div>

            </div>
            <div class="row">
                      <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.the_person_handicapped') }} (١٢١) </span>
                        <el-select  v-model="search_registration.the_person_handicapped1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="person_handicapped in yesOrno"
                             :key="person_handicapped.value"
                            :label="person_handicapped.label"
                            :value="person_handicapped.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.the_person_handicapped1']">
                            {{errors['search_registrations.the_person_handicapped1'][0]}}
                        </span>

                        <span class="text-danger" >
                        <!-- اضغط هنا لتسجيل استمارة معاق -->
                        <a href="#" v-if="search_registration.the_person_handicapped1 == '١'" @click.prevent="the_person_handicapped()"> {{ $trans('app.Press_disabled') }}</a>
                      </span>
                    </div>

                    <!-- <span class="demonstration">{{ $trans('app.anther_result') }} </span> -->




                 <div class="col-md-3 mt-2">
                       <span class="demonstration block">{{ $trans('app.Jailed') }} (١٢٢) </span>
                        <el-select  v-model="search_registration.Jailed1" placeholder="اختر الاجابة" >
                          <el-option
                            v-for="Jailed in yesOrno"
                             :key="Jailed.value"
                            :label="Jailed.label"
                            :value="Jailed.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['search_registrations.Jailed1']">
                            {{errors['search_registrations.Jailed1'][0]}}
                        </span>
                  </div>



            </div>
                   </el-collapse-item>  <!--  End for person one -->


                 </el-collapse>     <!--  End for collapse -->

              </el-tab-pane>

                <el-tab-pane    v-if="form.show_disability == 'true'">  <!--  start pane for disability   v-if="form.the_person_handicapped1 == '١' || form.the_person_handicapped2 == '١' || form.the_person_handicapped3 == '١' || form.the_person_handicapped4 == '١' || form.the_person_handicapped5 == '١' || form.the_person_handicapped6 == '١'"-->
                       <span slot="label"><i class="fab fa-accessible-icon"></i> {{ $trans('app.people_with_disabilities') }} </span>
                           <p class="text-center mb-1" >{{ $trans('app.First_characterization_disability') }}</p>
                        <div class="row">
                                 <table class="table table-bordered table-responsive  border-primary mt-4" >
                                  <!--  start table people_with_disabilities -->
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ $trans('app.num') }} </th>
                                        <th scope="col">{{ $trans('app.pointer') }}</th>
                                        <th scope="col">{{ $trans('app.first_person') }}</th>
                                        <th scope="col">{{ $trans('app.second_person') }}</th>
                                        <th scope="col">{{ $trans('app.third_person') }}</th>
                                        <th scope="col">{{ $trans('app.Notes') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠١	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.Disabled_persons_name') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-input size="small" placeholder="اسم الفرد" v-model="disabilities.disabled_persons_name1"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.disabled_persons_name1']">
                                                            {{errors['disabilities.disabled_persons_name1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                        <el-input size="small" placeholder="اسم الفرد" v-model="disabilities.disabled_persons_name2"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.disabled_persons_name2']">
                                                            {{errors['disabilities.disabled_persons_name2'][0]}}
                                                        </span>

                                                  </td>

                                                   <td>
                                                        <el-input size="small" placeholder="اسم الفرد" v-model="disabilities.disabled_persons_name3"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.disabled_persons_name3']">
                                                            {{errors['disabilities.disabled_persons_name3'][0]}}
                                                        </span>

                                                  </td>


                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes1"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes1']">
                                                              {{errors['disabilities.disability_Notes1'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>




                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٢	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.number_household_table') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-input size="small" type="number" placeholder="رقم الفرد" v-model="disabilities.number_household_table1"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.number_household_table1']">
                                                            {{errors['disabilities.number_household_table1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                        <el-input size="small" type="number" placeholder="رقم الفرد" v-model="disabilities.number_household_table2"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.number_household_table2']">
                                                            {{errors['disabilities.number_household_table2'][0]}}
                                                        </span>

                                                  </td>

                                                   <td>
                                                        <el-input size="small" type="number" placeholder="رقم الفرد" v-model="disabilities.number_household_table3"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.number_household_table3']">
                                                            {{errors['disabilities.number_household_table3'][0]}}
                                                        </span>

                                                  </td>


                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes2"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes2']">
                                                              {{errors['disabilities.disability_Notes2'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٣	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.have_any_disability') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.have_any_disability1" placeholder="نعم/لا" >
                                                          <el-option
                                                            v-for="have_any_disability1 in yesOrno"
                                                              :key="have_any_disability1.value"
                                                            :label="have_any_disability1.label"
                                                            :value="have_any_disability1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.have_any_disability1']">
                                                            {{errors['disabilities.have_any_disability1'][0]}}
                                                        </span>


                                                  </td>

                                                   <td>
                                                            <el-select  v-model="disabilities.have_any_disability2" placeholder="نعم/لا" >
                                                          <el-option
                                                            v-for="have_any_disability2 in yesOrno"
                                                              :key="have_any_disability2.value"
                                                            :label="have_any_disability2.label"
                                                            :value="have_any_disability2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.have_any_disability2']">
                                                            {{errors['disabilities.have_any_disability2'][0]}}
                                                        </span>



                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.have_any_disability3" placeholder="نعم/لا" >
                                                          <el-option
                                                            v-for="have_any_disability3 in yesOrno"
                                                              :key="have_any_disability3.value"
                                                            :label="have_any_disability3.label"
                                                            :value="have_any_disability3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.have_any_disability3']">
                                                            {{errors['disabilities.have_any_disability3'][0]}}
                                                        </span>




                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes3"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes3']">
                                                              {{errors['disabilities.disability_Notes3'][0]}}
                                                          </span>
                                                        </div>


                                                  </td>
                                            </tr>



                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٤	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.type_of_disability') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.type_of_disability1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="type_of_disability1 in type_of_disabilitys"
                                                              :key="type_of_disability1.value"
                                                            :label="type_of_disability1.label"
                                                            :value="type_of_disability1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.type_of_disability1']">
                                                            {{errors['disabilities.type_of_disability1'][0]}}
                                                        </span>



                                                        <el-input  size="small" placeholder="اكتب نوع الإعاقة" v-if="disabilities.type_of_disability1 == '٩٩'" v-model="disabilities.type_of_disability1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.type_of_disability1_anther']">
                                                              {{errors['disabilities.type_of_disability1_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.type_of_disability2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="type_of_disability2 in type_of_disabilitys"
                                                              :key="type_of_disability2.value"
                                                            :label="type_of_disability2.label"
                                                            :value="type_of_disability2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.type_of_disability2']">
                                                            {{errors['disabilities.type_of_disability2'][0]}}
                                                        </span>


                                                        <el-input  size="small" placeholder="اكتب نوع الإعاقة" v-if="disabilities.type_of_disability2 == '٩٩'" v-model="disabilities.type_of_disability2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.type_of_disability2_anther']">
                                                              {{errors['disabilities.type_of_disability2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.type_of_disability3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="type_of_disability3 in type_of_disabilitys"
                                                              :key="type_of_disability3.value"
                                                            :label="type_of_disability3.label"
                                                            :value="type_of_disability3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.type_of_disability3']">
                                                            {{errors['disabilities.type_of_disability3'][0]}}
                                                        </span>


                                                           <el-input  size="small" placeholder="اكتب نوع الإعاقة" v-if="disabilities.type_of_disability3 == '٩٩'" v-model="disabilities.type_of_disability3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.type_of_disability3_anther']">
                                                              {{errors['disabilities.type_of_disability3_anther'][0]}}
                                                          </span>

                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes4"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes4']">
                                                              {{errors['disabilities.disability_Notes4'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٥	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.degree_disability') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.degree_disability1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="degree_disability1 in degree_disabilitys"
                                                              :key="degree_disability1.value"
                                                            :label="degree_disability1.label"
                                                            :value="degree_disability1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.degree_disability1']">
                                                            {{errors['disabilities.degree_disability1'][0]}}
                                                        </span>


                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.degree_disability2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="degree_disability2 in degree_disabilitys"
                                                              :key="degree_disability2.value"
                                                            :label="degree_disability2.label"
                                                            :value="degree_disability2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.degree_disability2']">
                                                            {{errors['disabilities.degree_disability2'][0]}}
                                                        </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.degree_disability3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="degree_disability3 in degree_disabilitys"
                                                              :key="degree_disability3.value"
                                                            :label="degree_disability3.label"
                                                            :value="degree_disability3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.degree_disability3']">
                                                            {{errors['disabilities.degree_disability3'][0]}}
                                                        </span>




                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes5"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes5']">
                                                              {{errors['disabilities.disability_Notes5'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٦	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.relevant_methods') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.relevant_methods1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="relevant_methods1 in relevant_methods"
                                                              :key="relevant_methods1.value"
                                                            :label="relevant_methods1.label"
                                                            :value="relevant_methods1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.relevant_methods1']">
                                                            {{errors['disabilities.relevant_methods1'][0]}}
                                                        </span>


                                                          <el-input  size="small" placeholder="اكتب الوسيله" v-if="disabilities.relevant_methods1 == 'X'" v-model="disabilities.relevant_methods1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.relevant_methods1_anther']">
                                                              {{errors['disabilities.relevant_methods1_anther'][0]}}
                                                          </span>


                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.relevant_methods2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="relevant_methods2 in relevant_methods"
                                                              :key="relevant_methods2.value"
                                                            :label="relevant_methods2.label"
                                                            :value="relevant_methods2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.relevant_methods2']">
                                                            {{errors['disabilities.relevant_methods2'][0]}}
                                                        </span>


                                                        <el-input  size="small" placeholder="اكتب الوسيله" v-if="disabilities.relevant_methods2 == 'X'" v-model="disabilities.relevant_methods2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.relevant_methods2_anther']">
                                                              {{errors['disabilities.relevant_methods2_anther'][0]}}
                                                          </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.relevant_methods3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="relevant_methods3 in relevant_methods"
                                                              :key="relevant_methods3.value"
                                                            :label="relevant_methods3.label"
                                                            :value="relevant_methods3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.relevant_methods3']">
                                                            {{errors['disabilities.relevant_methods3'][0]}}
                                                        </span>

                                                        <el-input  size="small" placeholder="اكتب الوسيله" v-if="disabilities.relevant_methods3 == 'X'" v-model="disabilities.relevant_methods3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.relevant_methods3_anther']">
                                                              {{errors['disabilities.relevant_methods3_anther'][0]}}
                                                          </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes6"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes6']">
                                                              {{errors['disabilities.disability_Notes6'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>





                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٧	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.services_receives') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.services_receives1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="services_receives1 in services_receives"
                                                              :key="services_receives1.value"
                                                            :label="services_receives1.label"
                                                            :value="services_receives1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.services_receives1']">
                                                            {{errors['disabilities.services_receives1'][0]}}
                                                        </span>
                                                      <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.services_receives1 == 'X'" v-model="disabilities.services_receives1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.services_receives1_anther']">
                                                              {{errors['disabilities.services_receives1_anther'][0]}}
                                                          </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.services_receives2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="services_receives2 in services_receives"
                                                              :key="services_receives2.value"
                                                            :label="services_receives2.label"
                                                            :value="services_receives2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.services_receives2']">
                                                            {{errors['disabilities.services_receives2'][0]}}
                                                        </span>

                                                        <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.services_receives2 == 'X'" v-model="disabilities.services_receives2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.services_receives2_anther']">
                                                              {{errors['disabilities.services_receives2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.services_receives3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="services_receives3 in services_receives"
                                                              :key="services_receives3.value"
                                                            :label="services_receives3.label"
                                                            :value="services_receives3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.services_receives3']">
                                                            {{errors['disabilities.services_receives3'][0]}}
                                                        </span>

                                                       <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.services_receives3 == 'X'" v-model="disabilities.services_receives3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.services_receives3_anther']">
                                                              {{errors['disabilities.services_receives3_anther'][0]}}
                                                          </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes7"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes7']">
                                                              {{errors['disabilities.disability_Notes7'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                            <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١٠٨	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.Have_ever_obtained') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.have_ever_obtained1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="have_ever_obtained1 in have_ever_obtained"
                                                              :key="have_ever_obtained1.value"
                                                            :label="have_ever_obtained1.label"
                                                            :value="have_ever_obtained1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.have_ever_obtained1']">
                                                            {{errors['disabilities.have_ever_obtained1'][0]}}
                                                        </span>
                                                      <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.have_ever_obtained1 == 'X'" v-model="disabilities.have_ever_obtained1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.have_ever_obtained1_anther']">
                                                              {{errors['disabilities.have_ever_obtained1_anther'][0]}}
                                                          </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.have_ever_obtained2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="have_ever_obtained2 in have_ever_obtained"
                                                              :key="have_ever_obtained2.value"
                                                            :label="have_ever_obtained2.label"
                                                            :value="have_ever_obtained2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.have_ever_obtained2']">
                                                            {{errors['disabilities.have_ever_obtained2'][0]}}
                                                        </span>

                                                        <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.have_ever_obtained2 == 'X'" v-model="disabilities.have_ever_obtained2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.have_ever_obtained2_anther']">
                                                              {{errors['disabilities.have_ever_obtained2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.have_ever_obtained3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="have_ever_obtained3 in have_ever_obtained"
                                                              :key="have_ever_obtained3.value"
                                                            :label="have_ever_obtained3.label"
                                                            :value="have_ever_obtained3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.have_ever_obtained3']">
                                                            {{errors['disabilities.have_ever_obtained3'][0]}}
                                                        </span>

                                                       <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.have_ever_obtained3 == 'X'" v-model="disabilities.have_ever_obtained3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.have_ever_obtained3_anther']">
                                                              {{errors['disabilities.have_ever_obtained3_anther'][0]}}
                                                          </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes8"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes8']">
                                                              {{errors['disabilities.disability_Notes8'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block">  ١٠٩	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.cost_treatment') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.cost_treatment1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="cost_treatment1 in cost_treatment"
                                                              :key="cost_treatment1.value"
                                                            :label="cost_treatment1.label"
                                                            :value="cost_treatment1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.cost_treatment1']">
                                                            {{errors['disabilities.cost_treatment1'][0]}}
                                                        </span>
                                                      <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.cost_treatment1 == 'X'" v-model="disabilities.cost_treatment1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.cost_treatment1_anther']">
                                                              {{errors['disabilities.cost_treatment1_anther'][0]}}
                                                          </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.cost_treatment2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="cost_treatment2 in cost_treatment"
                                                              :key="cost_treatment2.value"
                                                            :label="cost_treatment2.label"
                                                            :value="cost_treatment2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.cost_treatment2']">
                                                            {{errors['disabilities.cost_treatment2'][0]}}
                                                        </span>

                                                        <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.cost_treatment2 == 'X'" v-model="disabilities.cost_treatment2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.cost_treatment2_anther']">
                                                              {{errors['disabilities.cost_treatment2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.cost_treatment3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="cost_treatment3 in cost_treatment"
                                                              :key="cost_treatment3.value"
                                                            :label="cost_treatment3.label"
                                                            :value="cost_treatment3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.cost_treatment3']">
                                                            {{errors['disabilities.cost_treatment3'][0]}}
                                                        </span>

                                                       <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.cost_treatment3 == 'X'" v-model="disabilities.cost_treatment3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.cost_treatment3_anther']">
                                                              {{errors['disabilities.cost_treatment3_anther'][0]}}
                                                          </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes9"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes9']">
                                                              {{errors['disabilities.disability_Notes9'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>




                                            <tr>
                                                  <td>
                                                        <span class="demonstration block">  ١١٠	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.the_services_obtained') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.the_services_obtained1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="the_services_obtained1 in the_services_obtained"
                                                              :key="the_services_obtained1.value"
                                                            :label="the_services_obtained1.label"
                                                            :value="the_services_obtained1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.the_services_obtained1']">
                                                            {{errors['disabilities.the_services_obtained1'][0]}}
                                                        </span>
                                                      <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.the_services_obtained1 == 'X'" v-model="disabilities.the_services_obtained1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.the_services_obtained1_anther']">
                                                              {{errors['disabilities.the_services_obtained1_anther'][0]}}
                                                          </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.the_services_obtained2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="the_services_obtained2 in the_services_obtained"
                                                              :key="the_services_obtained2.value"
                                                            :label="the_services_obtained2.label"
                                                            :value="the_services_obtained2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.the_services_obtained2']">
                                                            {{errors['disabilities.the_services_obtained2'][0]}}
                                                        </span>

                                                        <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.the_services_obtained2 == 'X'" v-model="disabilities.the_services_obtained2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.the_services_obtained2_anther']">
                                                              {{errors['disabilities.the_services_obtained2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.the_services_obtained3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="the_services_obtained3 in the_services_obtained"
                                                              :key="the_services_obtained3.value"
                                                            :label="the_services_obtained3.label"
                                                            :value="the_services_obtained3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.the_services_obtained3']">
                                                            {{errors['disabilities.the_services_obtained3'][0]}}
                                                        </span>

                                                       <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.the_services_obtained3 == 'X'" v-model="disabilities.the_services_obtained3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.the_services_obtained3_anther']">
                                                              {{errors['disabilities.the_services_obtained3_anther'][0]}}
                                                          </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes10"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes10']">
                                                              {{errors['disabilities.disability_Notes12'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                            <tr>
                                                  <td>
                                                        <span class="demonstration block"> ١١١ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.age_time_disability') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-input type="number" size="small" placeholder="اذكر السن" v-model="disabilities.age_time_disability1"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.age_time_disability1']">
                                                              {{errors['disabilities.age_time_disability1'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                         <el-input type="number" size="small" placeholder="اذكر السن" v-model="disabilities.age_time_disability2"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.age_time_disability2']">
                                                              {{errors['disabilities.age_time_disability2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                            <el-input type="number" size="small" placeholder="اذكر السن" v-model="disabilities.age_time_disability3"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.age_time_disability3']">
                                                              {{errors['disabilities.age_time_disability3'][0]}}
                                                          </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes11"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes11']">
                                                              {{errors['disabilities.disability_Notes11'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                                <tr>
                                                  <td>
                                                        <span class="demonstration block">  	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.currently_studying') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.currently_studying1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="currently_studying1 in yesOrno"
                                                              :key="currently_studying1.value"
                                                            :label="currently_studying1.label"
                                                            :value="currently_studying1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.currently_studying1']">
                                                            {{errors['disabilities.currently_studying1'][0]}}
                                                        </span>


                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.currently_studying2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="currently_studying2 in yesOrno"
                                                              :key="currently_studying2.value"
                                                            :label="currently_studying2.label"
                                                            :value="currently_studying2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.currently_studying2']">
                                                            {{errors['disabilities.currently_studying2'][0]}}
                                                        </span>

                                                  </td>

                                                   <td>
                                                          <el-select  v-model="disabilities.currently_studying3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="currently_studying3_ in yesOrno"
                                                              :key="currently_studying3_.value"
                                                            :label="currently_studying3_.label"
                                                            :value="currently_studying3_.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.currently_studying3']">
                                                            {{errors['disabilities.currently_studying3'][0]}}
                                                        </span>


                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes12"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes12']">
                                                              {{errors['disabilities.disability_Notes12'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                            <tr  v-if="disabilities.currently_studying1 == '١' ||  disabilities.currently_studying2 == '١' || disabilities.currently_studying3 == '١'">
                                                  <td>
                                                        <span class="demonstration block">  ١١٢	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.current_educational_trip') }}  </p>
                                                  </td>
                                                  <td>

                                                          <el-select  v-model="disabilities.current_educational_trip1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="current_educational_trip1 in current_educational_trip"
                                                              :key="current_educational_trip1.value"
                                                            :label="current_educational_trip1.label"
                                                            :value="current_educational_trip1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.current_educational_trip1']">
                                                            {{errors['disabilities.current_educational_trip1'][0]}}
                                                        </span>

                                                         <el-input  size="small" placeholder="اذكر المرحله التعليميه" v-if="disabilities.current_educational_trip1 == '٩'" v-model="disabilities.current_educational_trip1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.current_educational_trip1_anther']">
                                                              {{errors['disabilities.current_educational_trip1_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>

                                                          <el-select  v-model="disabilities.current_educational_trip2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="current_educational_trip2 in current_educational_trip"
                                                              :key="current_educational_trip2.value"
                                                            :label="current_educational_trip2.label"
                                                            :value="current_educational_trip2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.current_educational_trip2']">
                                                            {{errors['disabilities.current_educational_trip2'][0]}}
                                                        </span>

                                                         <el-input  size="small" placeholder="اذكر المرحله التعليميه" v-if="disabilities.current_educational_trip2 == '٩'" v-model="disabilities.current_educational_trip2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.current_educational_trip2_anther']">
                                                              {{errors['disabilities.current_educational_trip2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>

                                                          <el-select  v-model="disabilities.current_educational_trip3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="current_educational_trip3 in current_educational_trip"
                                                              :key="current_educational_trip3.value"
                                                            :label="current_educational_trip3.label"
                                                            :value="current_educational_trip3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.current_educational_trip3']">
                                                            {{errors['disabilities.current_educational_trip3'][0]}}
                                                        </span>

                                                          <el-input  size="small" placeholder="اذكر المرحله التعليميه" v-if="disabilities.current_educational_trip3 == '٩'" v-model="disabilities.current_educational_trip3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.current_educational_trip3_anther']">
                                                              {{errors['disabilities.current_educational_trip3_anther'][0]}}
                                                          </span>

                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.current_educational_trip_Notes"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.current_educational_trip_Notes']">
                                                              {{errors['disabilities.current_educational_trip_Notes'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                              <tr v-if="disabilities.currently_studying1 == '١' ||  disabilities.currently_studying2 == '١' || disabilities.currently_studying3 == '١'">
                                                  <td>
                                                        <span class="demonstration block"> ١١٣ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.What_educational_grade') }}  </p>
                                                  </td>
                                                  <td>
                                                           <el-radio v-model="disabilities.What_educational_grade1" value="١" label="1"> 1</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade1" value="٢" label="2"> 2</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade1" value="٣" label="3"> 3</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade1" value="٤" label="4"> 4</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade1"  value="٥" label="5"> 5</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade1" value="٦"  label="6"> 6</el-radio>


                                                        <span class="text-danger" v-if="errors['disabilities.What_educational_grade1']">
                                                            {{errors['disabilities.What_educational_grade1'][0]}}
                                                        </span>

                                                         <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.What_educational_grade1 == 'X'" v-model="disabilities.What_educational_grade1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.What_educational_grade1_anther']">
                                                              {{errors['disabilities.What_educational_grade1_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                         <el-radio v-model="disabilities.What_educational_grade2" value="١" label="1"> 1</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade2" value="٢" label="2"> 2</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade2" value="٣" label="3"> 3</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade2"  value="٤" label="4"> 4</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade2" value="٥" label="5"> 5</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade2" value="٦" label="6"> 6</el-radio>


                                                        <span class="text-danger" v-if="errors['disabilities.What_educational_grade2']">
                                                            {{errors['disabilities.What_educational_grade2'][0]}}
                                                        </span>

                                                         <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.What_educational_grade2 == 'X'" v-model="disabilities.What_educational_grade2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.What_educational_grade2_anther']">
                                                              {{errors['disabilities.What_educational_grade2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>

                                                          <el-radio v-model="disabilities.What_educational_grade3" value="١" label="١"> 1</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade3" value="٢" label="٢"> 2</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade3" value="٣" label="٣"> 3</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade3" value="٤" label="٤"> 4</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade3" value="٥" label="٥"> 5</el-radio>
                                                            <el-radio v-model="disabilities.What_educational_grade3" value="٦" label="٦"> 6</el-radio>

                                                        <span class="text-danger" v-if="errors['disabilities.What_educational_grade3']">
                                                            {{errors['disabilities.What_educational_grade3'][0]}}
                                                        </span>
                                                          <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.What_educational_grade3 == 'X'" v-model="disabilities.What_educational_grade3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.What_educational_grade3_anther']">
                                                              {{errors['disabilities.What_educational_grade3_anther'][0]}}
                                                          </span>

                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.What_educational_grade3_Notes"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.What_educational_grade3_Notes']">
                                                              {{errors['disabilities.What_educational_grade3_Notes'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                            <tr v-if=" disabilities.currently_studying1 == '٢' || disabilities.currently_studying2 == '٢' || disabilities.currently_studying3 == '٢'">
                                                  <td>
                                                        <span class="demonstration block">  ١١٤ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.reason_for_not_attending') }}  </p>
                                                  </td>
                                                  <td >
                                                          <el-select  v-if="disabilities.currently_studying1 == '٢'"  v-model="disabilities.reason_for_not_attending1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="reason_for_not_attending1 in reason_for_not_attending"
                                                              :key="reason_for_not_attending1.value"
                                                            :label="reason_for_not_attending1.label"
                                                            :value="reason_for_not_attending1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.reason_for_not_attending1']">
                                                            {{errors['disabilities.reason_for_not_attending1'][0]}}
                                                        </span>

                                                         <el-input type="textarea" size="small" :placeholder="$trans('app.reason_for_not_attending_anther')" v-if="disabilities.reason_for_not_attending1 == '٩'" v-model="disabilities.reason_for_not_attending1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.reason_for_not_attending1_anther']">
                                                              {{errors['disabilities.reason_for_not_attending1_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td >

                                                          <el-select  v-if="disabilities.currently_studying2 == '٢'"  v-model="disabilities.reason_for_not_attending2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="reason_for_not_attending2 in reason_for_not_attending"
                                                              :key="reason_for_not_attending2.value"
                                                            :label="reason_for_not_attending2.label"
                                                            :value="reason_for_not_attending2.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.reason_for_not_attending2']">
                                                            {{errors['disabilities.reason_for_not_attending2'][0]}}
                                                        </span>

                                                         <el-input  type="textarea" size="small" :placeholder="$trans('app.reason_for_not_attending_anther')" v-if="disabilities.reason_for_not_attending2 == '٩'" v-model="disabilities.reason_for_not_attending2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.reason_for_not_attending2_anther']">
                                                              {{errors['disabilities.reason_for_not_attending2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td >

                                                          <el-select  v-if="disabilities.currently_studying3 == '٢'" v-model="disabilities.reason_for_not_attending3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="reason_for_not_attending3 in reason_for_not_attending"
                                                              :key="reason_for_not_attending3.value"
                                                            :label="reason_for_not_attending3.label"
                                                            :value="reason_for_not_attending3.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.reason_for_not_attending3']">
                                                            {{errors['disabilities.reason_for_not_attending3'][0]}}
                                                        </span>

                                                          <el-input  type="textarea" size="small" :placeholder="$trans('app.reason_for_not_attending_anther')" v-if="disabilities.reason_for_not_attending3 == '٩'" v-model="disabilities.reason_for_not_attending3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.reason_for_not_attending3_anther']">
                                                              {{errors['disabilities.reason_for_not_attending3_anther'][0]}}
                                                          </span>

                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes15"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes15']">
                                                              {{errors['disabilities.disability_Notes15'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>
                                    </tbody>

                                 </table>
                                </div>

                                 <p class="text-center mb-1" >{{ $trans('app.causes_of_disability') }}</p>
                             <table class="table table-bordered table-responsive  border-primary mt-4" >
                                  <!--  start table people_with_disabilities -->
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ $trans('app.num') }} </th>
                                        <th scope="col">{{ $trans('app.pointer') }}</th>
                                        <th scope="col">{{ $trans('app.first_person') }}</th>
                                        <th scope="col">{{ $trans('app.second_person') }}</th>
                                        <th scope="col">{{ $trans('app.third_person') }}</th>
                                        <th scope="col">{{ $trans('app.Notes') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                                <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠١ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.mother_have_health_problem') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.mother_have_health_problem1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="mother_have_health_problem1 in yesNoDont"
                                                              :key="mother_have_health_problem1.value"
                                                            :label="mother_have_health_problem1.label"
                                                            :value="mother_have_health_problem1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.mother_have_health_problem1']">
                                                            {{errors['disabilities.mother_have_health_problem1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.mother_have_health_problem2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="mother_have_health_problem2 in yesNoDont"
                                                              :key="mother_have_health_problem2.value"
                                                            :label="mother_have_health_problem2.label"
                                                            :value="mother_have_health_problem2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.mother_have_health_problem2']">
                                                              {{errors['disabilities.mother_have_health_problem2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.mother_have_health_problem3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="mother_have_health_problem3 in yesNoDont"
                                                              :key="mother_have_health_problem3.value"
                                                            :label="mother_have_health_problem3.label"
                                                            :value="mother_have_health_problem3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.mother_have_health_problem3']">
                                                              {{errors['disabilities.mother_have_health_problem3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes16"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes16']">
                                                              {{errors['disabilities.disability_Notes16'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٢ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.birth_difficult') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.birth_difficult1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="birth_difficult1 in yesNoDont"
                                                              :key="birth_difficult1.value"
                                                            :label="birth_difficult1.label"
                                                            :value="birth_difficult1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.birth_difficult1']">
                                                            {{errors['disabilities.birth_difficult1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.birth_difficult2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="birth_difficult2 in yesNoDont"
                                                              :key="birth_difficult2.value"
                                                            :label="birth_difficult2.label"
                                                            :value="birth_difficult2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.birth_difficult2']">
                                                              {{errors['disabilities.birth_difficult2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.birth_difficult3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="birth_difficult3 in yesNoDont"
                                                              :key="birth_difficult3.value"
                                                            :label="birth_difficult3.label"
                                                            :value="birth_difficult3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.birth_difficult3']">
                                                              {{errors['disabilities.birth_difficult3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes17"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes17']">
                                                              {{errors['disabilities.disability_Notes17'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٣ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.born_less_than_7_months_old') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.born_less_than_7_months_old1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="born_less_than_7_months_old1 in yesNoDont"
                                                              :key="born_less_than_7_months_old1.value"
                                                            :label="born_less_than_7_months_old1.label"
                                                            :value="born_less_than_7_months_old1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.born_less_than_7_months_old1']">
                                                            {{errors['disabilities.born_less_than_7_months_old1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.born_less_than_7_months_old2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="born_less_than_7_months_old2 in yesNoDont"
                                                              :key="born_less_than_7_months_old2.value"
                                                            :label="born_less_than_7_months_old2.label"
                                                            :value="born_less_than_7_months_old2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.born_less_than_7_months_old2']">
                                                              {{errors['disabilities.born_less_than_7_months_old2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.born_less_than_7_months_old3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="born_less_than_7_months_old3 in yesNoDont"
                                                              :key="born_less_than_7_months_old3.value"
                                                            :label="born_less_than_7_months_old3.label"
                                                            :value="born_less_than_7_months_old3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.born_less_than_7_months_old3']">
                                                              {{errors['disabilities.born_less_than_7_months_old3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes18"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes18']">
                                                              {{errors['disabilities.disability_Notes18'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٤ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.birth_less_than') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.birth_less_than1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="birth_less_than1 in yesNoDont"
                                                              :key="birth_less_than1.value"
                                                            :label="birth_less_than1.label"
                                                            :value="birth_less_than1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.birth_less_than1']">
                                                            {{errors['disabilities.birth_less_than1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.birth_less_than2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="birth_less_than2 in yesNoDont"
                                                              :key="birth_less_than2.value"
                                                            :label="birth_less_than2.label"
                                                            :value="birth_less_than2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.birth_less_than2']">
                                                              {{errors['disabilities.birth_less_than2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.birth_less_than3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="birth_less_than3 in yesNoDont"
                                                              :key="birth_less_than3.value"
                                                            :label="birth_less_than3.label"
                                                            :value="birth_less_than3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.birth_less_than3']">
                                                              {{errors['disabilities.birth_less_than3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes19"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes19']">
                                                              {{errors['disabilities.disability_Notes19'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٥ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.suffer_from_jaundice_after') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.suffer_from_jaundice_after1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="suffer_from_jaundice_after1 in yesNoDont"
                                                              :key="suffer_from_jaundice_after1.value"
                                                            :label="suffer_from_jaundice_after1.label"
                                                            :value="suffer_from_jaundice_after1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.suffer_from_jaundice_after1']">
                                                            {{errors['disabilities.suffer_from_jaundice_after1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.suffer_from_jaundice_after2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="suffer_from_jaundice_after2 in yesNoDont"
                                                              :key="suffer_from_jaundice_after2.value"
                                                            :label="suffer_from_jaundice_after2.label"
                                                            :value="suffer_from_jaundice_after2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.suffer_from_jaundice_after2']">
                                                              {{errors['disabilities.suffer_from_jaundice_after2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.suffer_from_jaundice_after3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="suffer_from_jaundice_after3 in yesNoDont"
                                                              :key="suffer_from_jaundice_after3.value"
                                                            :label="suffer_from_jaundice_after3.label"
                                                            :value="suffer_from_jaundice_after3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.suffer_from_jaundice_after3']">
                                                              {{errors['disabilities.suffer_from_jaundice_after3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes20"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes20']">
                                                              {{errors['disabilities.disability_Notes20'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>





                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٦ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.suffer_from_cramps') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.suffer_from_cramps1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="suffer_from_cramps1 in yesNoDont"
                                                              :key="suffer_from_cramps1.value"
                                                            :label="suffer_from_cramps1.label"
                                                            :value="suffer_from_cramps1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.suffer_from_cramps1']">
                                                            {{errors['disabilities.suffer_from_cramps1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.suffer_from_cramps2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="suffer_from_cramps2 in yesNoDont"
                                                              :key="suffer_from_cramps2.value"
                                                            :label="suffer_from_cramps2.label"
                                                            :value="suffer_from_cramps2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.suffer_from_cramps2']">
                                                              {{errors['disabilities.suffer_from_cramps2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.suffer_from_cramps3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="suffer_from_cramps3 in yesNoDont"
                                                              :key="suffer_from_cramps3.value"
                                                            :label="suffer_from_cramps3.label"
                                                            :value="suffer_from_cramps3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.suffer_from_cramps3']">
                                                              {{errors['disabilities.suffer_from_cramps3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes21"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes21']">
                                                              {{errors['disabilities.disability_Notes21'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>




                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٧ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.Have_been_booked_nursery') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.Have_been_booked_nursery1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="Have_been_booked_nursery1 in yesNoDont"
                                                              :key="Have_been_booked_nursery1.value"
                                                            :label="Have_been_booked_nursery1.label"
                                                            :value="Have_been_booked_nursery1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.Have_been_booked_nursery1']">
                                                            {{errors['disabilities.Have_been_booked_nursery1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.Have_been_booked_nursery2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="Have_been_booked_nursery2 in yesNoDont"
                                                              :key="Have_been_booked_nursery2.value"
                                                            :label="Have_been_booked_nursery2.label"
                                                            :value="Have_been_booked_nursery2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.Have_been_booked_nursery2']">
                                                              {{errors['disabilities.Have_been_booked_nursery2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.Have_been_booked_nursery3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="Have_been_booked_nursery3 in yesNoDont"
                                                              :key="Have_been_booked_nursery3.value"
                                                            :label="Have_been_booked_nursery3.label"
                                                            :value="Have_been_booked_nursery3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.Have_been_booked_nursery3']">
                                                              {{errors['disabilities.Have_been_booked_nursery3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes22"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes22']">
                                                              {{errors['disabilities.disability_Notes22'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٨ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.meningitis_or_meningitis') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.meningitis_or_meningitis1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="meningitis_or_meningitis1 in yesNoDont"
                                                              :key="meningitis_or_meningitis1.value"
                                                            :label="meningitis_or_meningitis1.label"
                                                            :value="meningitis_or_meningitis1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.meningitis_or_meningitis1']">
                                                            {{errors['disabilities.meningitis_or_meningitis1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.meningitis_or_meningitis2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="meningitis_or_meningitis2 in yesNoDont"
                                                              :key="meningitis_or_meningitis2.value"
                                                            :label="meningitis_or_meningitis2.label"
                                                            :value="meningitis_or_meningitis2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.meningitis_or_meningitis2']">
                                                              {{errors['disabilities.meningitis_or_meningitis2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.meningitis_or_meningitis3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="meningitis_or_meningitis3 in yesNoDont"
                                                              :key="meningitis_or_meningitis3.value"
                                                            :label="meningitis_or_meningitis3.label"
                                                            :value="meningitis_or_meningitis3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.meningitis_or_meningitis3']">
                                                              {{errors['disabilities.meningitis_or_meningitis3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes23"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes23']">
                                                              {{errors['disabilities.disability_Notes23'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢٠٩ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.mother_and_father_relationship') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.mother_and_father_relationship1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="mother_and_father_relationship1 in yesOrno"
                                                              :key="mother_and_father_relationship1.value"
                                                            :label="mother_and_father_relationship1.label"
                                                            :value="mother_and_father_relationship1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.mother_and_father_relationship1']">
                                                            {{errors['disabilities.mother_and_father_relationship1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.mother_and_father_relationship2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="mother_and_father_relationship2 in yesOrno"
                                                              :key="mother_and_father_relationship2.value"
                                                            :label="mother_and_father_relationship2.label"
                                                            :value="mother_and_father_relationship2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.mother_and_father_relationship2']">
                                                              {{errors['disabilities.mother_and_father_relationship2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.mother_and_father_relationship3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="mother_and_father_relationship3 in yesOrno"
                                                              :key="mother_and_father_relationship3.value"
                                                            :label="mother_and_father_relationship3.label"
                                                            :value="mother_and_father_relationship3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.mother_and_father_relationship3']">
                                                              {{errors['disabilities.mother_and_father_relationship3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes24"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes24']">
                                                              {{errors['disabilities.disability_Notes24'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢١٠ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.accident_that_led') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.accident_that_led1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="accident_that_led1 in yesOrno"
                                                              :key="accident_that_led1.value"
                                                            :label="accident_that_led1.label"
                                                            :value="accident_that_led1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.accident_that_led1']">
                                                            {{errors['disabilities.accident_that_led1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.accident_that_led2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="accident_that_led2 in yesOrno"
                                                              :key="accident_that_led2.value"
                                                            :label="accident_that_led2.label"
                                                            :value="accident_that_led2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.accident_that_led2']">
                                                              {{errors['disabilities.accident_that_led2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.accident_that_led3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="accident_that_led3 in yesOrno"
                                                              :key="accident_that_led3.value"
                                                            :label="accident_that_led3.label"
                                                            :value="accident_that_led3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.accident_that_led3']">
                                                              {{errors['disabilities.accident_that_led3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes25"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.accident_that_led_Notes25']">
                                                              {{errors['disabilities.accident_that_led_Notes25'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                                <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢١١ 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.due_chronic_disease') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.due_chronic_disease1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="due_chronic_disease1 in yesOrno"
                                                              :key="due_chronic_disease1.value"
                                                            :label="due_chronic_disease1.label"
                                                            :value="due_chronic_disease1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.due_chronic_disease1']">
                                                            {{errors['disabilities.due_chronic_disease1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.due_chronic_disease2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="due_chronic_disease2 in yesOrno"
                                                              :key="due_chronic_disease2.value"
                                                            :label="due_chronic_disease2.label"
                                                            :value="due_chronic_disease2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.due_chronic_disease2']">
                                                              {{errors['disabilities.due_chronic_disease2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.due_chronic_disease3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="due_chronic_disease3 in yesOrno"
                                                              :key="due_chronic_disease3.value"
                                                            :label="due_chronic_disease3.label"
                                                            :value="due_chronic_disease3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.due_chronic_disease3']">
                                                              {{errors['disabilities.due_chronic_disease3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes26"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes26']">
                                                              {{errors['disabilities.disability_Notes26'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                               <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٢١٢	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.another_reason_led') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-select  v-model="disabilities.another_reason_led1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="another_reason_led1 in yesOrno"
                                                              :key="another_reason_led1.value"
                                                            :label="another_reason_led1.label"
                                                            :value="another_reason_led1.value">
                                                          </el-option>
                                                        </el-select>
                                                        <span class="text-danger" v-if="errors['disabilities.another_reason_led1']">
                                                            {{errors['disabilities.another_reason_led1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.another_reason_led2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="another_reason_led2 in yesOrno"
                                                              :key="another_reason_led2.value"
                                                            :label="another_reason_led2.label"
                                                            :value="another_reason_led2.value">
                                                          </el-option>
                                                        </el-select>
                                                          <span class="text-danger" v-if="errors['disabilities.another_reason_led2']">
                                                              {{errors['disabilities.another_reason_led2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.another_reason_led3" placeholder="اختر" >
                                                          <el-option
                                                            v-for="another_reason_led3 in yesOrno"
                                                              :key="another_reason_led3.value"
                                                            :label="another_reason_led3.label"
                                                            :value="another_reason_led3.value">
                                                          </el-option>
                                                        </el-select>
                                                             <span class="text-danger" v-if="errors['disabilities.another_reason_led3']">
                                                              {{errors['disabilities.another_reason_led3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes27"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes27']">
                                                              {{errors['disabilities.disability_Notes27'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                             <tr v-if="disabilities.another_reason_led1 == '١'  || disabilities.another_reason_led2 == '١' || disabilities.another_reason_led3 == '١' ">
                                                  <td>
                                                        <span class="demonstration block"> ٢١٣	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.Tell_reason') }}  </p>
                                                  </td>
                                                  <td>
                                                       <el-input type="textarea" size="small" placeholder="اذكر السبب" v-model="disabilities.tell_reason1"  ></el-input>
                                                        <span class="text-danger" v-if="errors['disabilities.tell_reason1']">
                                                            {{errors['disabilities.tell_reason1'][0]}}
                                                        </span>
                                                  </td>

                                                   <td>
                                                        <el-input type="textarea" size="small" placeholder="اذكر السبب" v-model="disabilities.tell_reason2"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.tell_reason2']">
                                                              {{errors['disabilities.tell_reason2'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                            <el-input type="textarea" size="small" placeholder="اذكر السبب" v-model="disabilities.tell_reason3"  ></el-input>
                                                             <span class="text-danger" v-if="errors['disabilities.tell_reason3']">
                                                              {{errors['disabilities.tell_reason3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes28"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes28']">
                                                              {{errors['disabilities.disability_Notes28'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>
                                    </tbody>
                                 </table>


                          <p class="text-center mb-1" >{{ $trans('app.Third_motor_disability') }}</p>
                             <table class="table table-bordered table-responsive  border-primary mt-4">
                                  <!--  start table people_with_disabilities -->
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ $trans('app.num') }} </th>
                                        <th scope="col">{{ $trans('app.pointer') }}</th>
                                        <th scope="col">{{ $trans('app.first_person') }}</th>
                                        <th scope="col">{{ $trans('app.second_person') }}</th>
                                        <th scope="col">{{ $trans('app.third_person') }}</th>
                                        <th scope="col">{{ $trans('app.Notes') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠١	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.weight') }}  </p>
                                                  </td>
                                                  <td>
                                             <el-input type="number" size="small" placeholder="كجم" v-model="disabilities.weight1"  ></el-input>
                                                    <span class="text-danger" v-if="errors['disabilities.weight1']">
                                                        {{errors['disabilities.weight1'][0]}}
                                                    </span>
                                                  </td>

                                                   <td>
                                                        <el-input type="number" size="small" placeholder="كجم" v-model="disabilities.weight2"  ></el-input>
                                                    <span class="text-danger" v-if="errors['disabilities.weight2']">
                                                        {{errors['disabilities.weight2'][0]}}
                                                    </span>

                                                  </td>

                                                   <td>
                                                       <el-input type="number" size="small" placeholder="كجم" v-model="disabilities.weight3"  ></el-input>
                                                            <span class="text-danger" v-if="errors['disabilities.weight3']">
                                                              {{errors['disabilities.weight3'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes29"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes29']">
                                                              {{errors['disabilities.disability_Notes29'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                               <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٢	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.amputation_type') }}  </p>
                                                  </td>
                                                  <td>
                                                        <el-select  v-model="disabilities.amputation_type1" placeholder="اختر" >
                                                                <el-option
                                                                    v-for="amputation_type1 in amputation_types"
                                                                    :key="amputation_type1.value"
                                                                    :label="amputation_type1.label"
                                                                    :value="amputation_type1.value">
                                                                </el-option>
                                                                </el-select>
                                                                <span class="text-danger" v-if="errors['disabilities.amputation_type1']">
                                                                    {{errors['disabilities.amputation_type1'][0]}}
                                                                </span>

                                                            <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.amputation_type1 == '٩'" v-model="disabilities.amputation_type1_anther"  ></el-input>
                                                                <span class="text-danger" v-if="errors['disabilities.amputation_type1_anther']">
                                                                    {{errors['disabilities.amputation_type1_anther'][0]}}
                                                                </span>
                                                  </td>

                                                   <td>
                                                      <el-select  v-model="disabilities.amputation_type2" placeholder="اختر" >
                                                                <el-option
                                                                    v-for="amputation_type2 in amputation_types"
                                                                    :key="amputation_type2.value"
                                                                    :label="amputation_type2.label"
                                                                    :value="amputation_type2.value">
                                                                </el-option>
                                                                </el-select>
                                                                <span class="text-danger" v-if="errors['disabilities.amputation_type2']">
                                                                    {{errors['disabilities.amputation_type2'][0]}}
                                                                </span>

                                                            <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.amputation_type2 == '٩'" v-model="disabilities.amputation_type2_anther"  ></el-input>
                                                                <span class="text-danger" v-if="errors['disabilities.amputation_type2_anther']">
                                                                    {{errors['disabilities.amputation_type2_anther'][0]}}
                                                                </span>

                                                  </td>

                                                   <td>
                                                       <el-select  v-model="disabilities.amputation_type3" placeholder="اختر" >
                                                                <el-option
                                                                    v-for="amputation_type3 in amputation_types"
                                                                    :key="amputation_type3.value"
                                                                    :label="amputation_type3.label"
                                                                    :value="amputation_type3.value">
                                                                </el-option>
                                                                </el-select>
                                                                <span class="text-danger" v-if="errors['disabilities.amputation_type3']">
                                                                    {{errors['disabilities.amputation_type3'][0]}}
                                                                </span>

                                                            <el-input  size="small" placeholder="اذكر الخدمة" v-if="disabilities.amputation_type3 == '٩'" v-model="disabilities.amputation_type3_anther"  ></el-input>
                                                                <span class="text-danger" v-if="errors['disabilities.amputation_type3_anther']">
                                                                    {{errors['disabilities.amputation_type3_anther'][0]}}
                                                                </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes30"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes30']">
                                                              {{errors['disabilities.disability_Notes30'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٣</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.date_amputation') }}  </p>
                                                  </td>
                                                  <td>
                                                      <div class="block">
                                                        <span class="demonstration block"> {{ $trans('app.history') }}</span>
                                                        <el-date-picker
                                                          v-model="disabilities.date_amputation_month1"
                                                          type="month"
                                                          value-format="yyyy-MM"
                                                          placeholder="حدد السنة والشهر">
                                                        </el-date-picker>
                                                      </div>

                                                    <span class="text-danger" v-if="errors['disabilities.date_amputation_month1']">
                                                        {{errors['disabilities.date_amputation_month1'][0]}}
                                                    </span>
                                                  </td>

                                                   <td>
                                                     <div class="block">
                                                        <span class="demonstration block"> {{ $trans('app.history') }}</span>
                                                        <el-date-picker
                                                          v-model="disabilities.date_amputation_month2"
                                                          type="month"
                                                          value-format="yyyy-MM"
                                                          placeholder="حدد السنة والشهر">
                                                        </el-date-picker>
                                                      </div>

                                                    <span class="text-danger" v-if="errors['disabilities.date_amputation_month2']">
                                                        {{errors['disabilities.date_amputation_month2'][0]}}
                                                    </span>

                                                  </td>

                                                   <td>
                                                      <div class="block">
                                                        <span class="demonstration block"> {{ $trans('app.history') }}</span>
                                                        <el-date-picker
                                                          v-model="disabilities.date_amputation_month3"
                                                          type="month"
                                                          value-format="yyyy-MM"
                                                          placeholder="حدد السنة والشهر">
                                                        </el-date-picker>
                                                      </div>

                                                    <span class="text-danger" v-if="errors['disabilities.date_amputation_month3']">
                                                        {{errors['disabilities.date_amputation_month3'][0]}}
                                                    </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes31"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes31']">
                                                              {{errors['disabilities.disability_Notes31'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٤	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.reason_amputation') }}  </p>
                                                  </td>
                                                  <td>

                                                  <el-select  v-model="disabilities.reason_amputation1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="reason_amputation1 in reason_amputation"
                                                              :key="reason_amputation1.value"
                                                            :label="reason_amputation1.label"
                                                            :value="reason_amputation1.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.reason_amputation1']">
                                                        {{errors['disabilities.reason_amputation1'][0]}}
                                                    </span>


                                                      <el-input type="textarea" size="small" placeholder="اكتب سبب البتر" v-if="disabilities.reason_amputation1 == '٩'" v-model="disabilities.reason_amputation1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.reason_amputation1_anther']">
                                                              {{errors['disabilities.reason_amputation1_anther'][0]}}
                                                          </span>

                                                  </td>

                                                   <td>
                                                        <el-select  v-model="disabilities.reason_amputation2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="reason_amputation2 in reason_amputation"
                                                              :key="reason_amputation2.value"
                                                            :label="reason_amputation2.label"
                                                            :value="reason_amputation2.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.reason_amputation2']">
                                                        {{errors['disabilities.reason_amputation2'][0]}}
                                                    </span>


                                                      <el-input type="textarea" size="small" placeholder="اكتب سبب البتر" v-if="disabilities.reason_amputation2 == '٩'" v-model="disabilities.reason_amputation2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.reason_amputation2_anther']">
                                                              {{errors['disabilities.reason_amputation2_anther'][0]}}
                                                          </span>
                                                  </td>

                                                   <td>
                                                    <el-select  v-model="disabilities.reason_amputation3" placeholder="اختر" >
                                                      <el-option
                                                        v-for="reason_amputation3 in reason_amputation"
                                                          :key="reason_amputation3.value"
                                                        :label="reason_amputation3.label"
                                                        :value="reason_amputation3.value">
                                                      </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.reason_amputation3']">
                                                        {{errors['disabilities.reason_amputation3'][0]}}
                                                    </span>

                                                   <el-input type="textarea" size="small" placeholder="اكتب سبب البتر" v-if="disabilities.reason_amputation3 == '٩'" v-model="disabilities.reason_amputation3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.reason_amputation2_anther']">
                                                              {{errors['disabilities.reason_amputation2_anther'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes32"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes32']">
                                                              {{errors['disabilities.disability_Notes32'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٥	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.amputation_case') }}  </p>
                                                  </td>
                                                  <td>

                                                  <el-select  v-model="disabilities.amputation_case1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="amputation_case1 in amputation_case"
                                                              :key="amputation_case1.value"
                                                            :label="amputation_case1.label"
                                                            :value="amputation_case1.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.amputation_case1']">
                                                        {{errors['disabilities.amputation_case1'][0]}}
                                                    </span>


                                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-if="disabilities.amputation_case1 == '٩'" v-model="disabilities.amputation_case1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.amputation_case1_anther']">
                                                              {{errors['disabilities.amputation_case1_anther'][0]}}
                                                          </span>

                                                  </td>
                                                   <td>
                                                        <el-select  v-model="disabilities.amputation_case2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="amputation_case2 in amputation_case"
                                                              :key="amputation_case2.value"
                                                            :label="amputation_case2.label"
                                                            :value="amputation_case2.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.amputation_case2']">
                                                        {{errors['disabilities.amputation_case2'][0]}}
                                                    </span>


                                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-if="disabilities.amputation_case2 == '٩'" v-model="disabilities.amputation_case2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.amputation_case2_anther']">
                                                              {{errors['disabilities.amputation_case2_anther'][0]}}
                                                          </span>
                                                  </td>
                                                   <td>
                                                    <el-select  v-model="disabilities.amputation_case3" placeholder="اختر" >
                                                      <el-option
                                                        v-for="amputation_case3 in amputation_case"
                                                          :key="amputation_case3.value"
                                                        :label="amputation_case3.label"
                                                        :value="amputation_case3.value">
                                                      </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.amputation_case3']">
                                                        {{errors['disabilities.amputation_case3'][0]}}
                                                    </span>

                                                   <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-if="disabilities.amputation_case3 == '٩'" v-model="disabilities.amputation_case3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.amputation_case3_anther']">
                                                              {{errors['disabilities.amputation_case3_anther'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes33"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes33']">
                                                              {{errors['disabilities.disability_Notes33'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>



                                             <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٦	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.amputation_level') }}  </p>
                                                  </td>
                                                  <td>

                                                  <el-select  v-model="disabilities.amputation_level1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="amputation_level1 in amputation_level"
                                                              :key="amputation_level1.value"
                                                            :label="amputation_level1.label"
                                                            :value="amputation_level1.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.amputation_level1']">
                                                        {{errors['disabilities.amputation_level1'][0]}}
                                                    </span>


                                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-if="disabilities.amputation_level1 == '٩'" v-model="disabilities.amputation_level1_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.amputation_level1_anther']">
                                                              {{errors['disabilities.amputation_level1_anther'][0]}}
                                                          </span>

                                                  </td>
                                                   <td>
                                                        <el-select  v-model="disabilities.amputation_level2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="amputation_level2 in amputation_level"
                                                              :key="amputation_level2.value"
                                                            :label="amputation_level2.label"
                                                            :value="amputation_level2.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.amputation_level2']">
                                                        {{errors['disabilities.amputation_level2'][0]}}
                                                    </span>


                                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-if="disabilities.amputation_level2 == '٩'" v-model="disabilities.amputation_level2_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.amputation_level2_anther']">
                                                              {{errors['disabilities.amputation_level2_anther'][0]}}
                                                          </span>
                                                  </td>
                                                   <td>
                                                    <el-select  v-model="disabilities.amputation_level3" placeholder="اختر" >
                                                      <el-option
                                                        v-for="amputation_level3 in amputation_level"
                                                          :key="amputation_level3.value"
                                                        :label="amputation_level3.label"
                                                        :value="amputation_level3.value">
                                                      </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.amputation_level3']">
                                                        {{errors['disabilities.amputation_level3'][0]}}
                                                    </span>

                                                   <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-if="disabilities.amputation_level3 == '٩'" v-model="disabilities.amputation_level3_anther"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.amputation_level3_anther']">
                                                              {{errors['disabilities.amputation_level3_anther'][0]}}
                                                          </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes34"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes34']">
                                                              {{errors['disabilities.disability_Notes34'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                            <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٧	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.party_status') }}  </p>
                                                  </td>
                                                  <td>
                                                  <el-select  v-model="disabilities.party_status1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="party_status1 in party_status"
                                                              :key="party_status1.value"
                                                            :label="party_status1.label"
                                                            :value="party_status1.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.party_status1']">
                                                        {{errors['disabilities.party_status1'][0]}}
                                                    </span>
                                                  </td>
                                                   <td>
                                                        <el-select  v-model="disabilities.party_status2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="party_status2 in party_status"
                                                              :key="party_status2.value"
                                                            :label="party_status2.label"
                                                            :value="party_status2.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.party_status2']">
                                                        {{errors['disabilities.party_status2'][0]}}
                                                    </span>

                                                  </td>
                                                   <td>
                                                    <el-select  v-model="disabilities.party_status3" placeholder="اختر" >
                                                      <el-option
                                                        v-for="party_status3 in party_status"
                                                          :key="party_status3.value"
                                                        :label="party_status3.label"
                                                        :value="party_status3.value">
                                                      </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.party_status3']">
                                                        {{errors['disabilities.party_status3'][0]}}
                                                    </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes35"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes35']">
                                                              {{errors['disabilities.disability_Notes35'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                               <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٨	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.use_any_compensatory') }}  </p>
                                                  </td>
                                                  <td>
                                                  <el-select  v-model="disabilities.use_any_compensatory1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="use_any_compensatory1 in use_any_compensatory"
                                                              :key="use_any_compensatory1.value"
                                                            :label="use_any_compensatory1.label"
                                                            :value="use_any_compensatory1.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.use_any_compensatory1']">
                                                        {{errors['disabilities.use_any_compensatory1'][0]}}
                                                    </span>
                                                  </td>
                                                   <td>
                                                        <el-select  v-model="disabilities.use_any_compensatory2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="use_any_compensatory2 in use_any_compensatory"
                                                              :key="use_any_compensatory2.value"
                                                            :label="use_any_compensatory2.label"
                                                            :value="use_any_compensatory2.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.use_any_compensatory2']">
                                                        {{errors['disabilities.use_any_compensatory2'][0]}}
                                                    </span>

                                                  </td>
                                                   <td>
                                                    <el-select  v-model="disabilities.use_any_compensatory3" placeholder="اختر" >
                                                      <el-option
                                                        v-for="use_any_compensatory3 in use_any_compensatory"
                                                          :key="use_any_compensatory3.value"
                                                        :label="use_any_compensatory3.label"
                                                        :value="use_any_compensatory3.value">
                                                      </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.use_any_compensatory3']">
                                                        {{errors['disabilities.use_any_compensatory3'][0]}}
                                                    </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes36"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes36']">
                                                              {{errors['disabilities.disability_Notes36'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                               <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣٠٩	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.other_medical_problems') }}  </p>
                                                  </td>
                                                  <td>
                                                  <el-select  v-model="disabilities.other_medical_problems1" placeholder="اختر" >
                                                          <el-option
                                                            v-for="other_medical_problems1 in yesOrno"
                                                              :key="other_medical_problems1.value"
                                                            :label="other_medical_problems1.label"
                                                            :value="other_medical_problems1.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.other_medical_problems1']">
                                                        {{errors['disabilities.other_medical_problems1'][0]}}
                                                    </span>
                                                  </td>
                                                   <td>
                                                        <el-select  v-model="disabilities.other_medical_problems2" placeholder="اختر" >
                                                          <el-option
                                                            v-for="other_medical_problems2 in yesOrno"
                                                              :key="other_medical_problems2.value"
                                                            :label="other_medical_problems2.label"
                                                            :value="other_medical_problems2.value">
                                                          </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.other_medical_problems2']">
                                                        {{errors['disabilities.other_medical_problems2'][0]}}
                                                    </span>

                                                  </td>
                                                   <td>
                                                    <el-select  v-model="disabilities.other_medical_problems3" placeholder="اختر" >
                                                      <el-option
                                                        v-for="other_medical_problems3 in yesOrno"
                                                          :key="other_medical_problems3.value"
                                                        :label="other_medical_problems3.label"
                                                        :value="other_medical_problems3.value">
                                                      </el-option>
                                                        </el-select>
                                                    <span class="text-danger" v-if="errors['disabilities.other_medical_problems2']">
                                                        {{errors['disabilities.other_medical_problems2'][0]}}
                                                    </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes37"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes37']">
                                                              {{errors['disabilities.disability_Notes37'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>


                                              <tr>
                                                  <td>
                                                        <span class="demonstration block"> ٣١٠	 	</span>
                                                  </td>
                                                  <td>
                                                    <p class="text-size"> {{ $trans('app.mention_problems') }}  </p>
                                                  </td>
                                                  <td>

                                                    <el-input type="textarea" size="small" placeholder="(ان وجد) المشاكل" v-model="disabilities.mention_problems1"  ></el-input>
                                                    <span class="text-danger" v-if="errors['disabilities.mention_problems1']">
                                                        {{errors['disabilities.mention_problems1'][0]}}
                                                    </span>
                                                  </td>
                                                   <td>
                                                      <el-input type="textarea" size="small" placeholder="(ان وجد) المشاكل" v-model="disabilities.mention_problems2"  ></el-input>
                                                    <span class="text-danger" v-if="errors['disabilities.mention_problems2']">
                                                        {{errors['disabilities.mention_problems2'][0]}}
                                                    </span>

                                                  </td>
                                                   <td>
                                                      <el-input type="textarea" size="small" placeholder="(ان وجد) المشاكل" v-model="disabilities.mention_problems3"  ></el-input>
                                                    <span class="text-danger" v-if="errors['disabilities.mention_problems3']">
                                                        {{errors['disabilities.mention_problems3'][0]}}
                                                    </span>
                                                  </td>
                                                  <td>
                                                        <div class="width-table">
                                                        <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="disabilities.disability_Notes38"  ></el-input>
                                                          <span class="text-danger" v-if="errors['disabilities.disability_Notes38']">
                                                              {{errors['disabilities.disability_Notes38'][0]}}
                                                          </span>
                                                        </div>
                                                  </td>
                                            </tr>

                                    </tbody>
                             </table>


                        </el-tab-pane>







                <el-tab-pane>  <!--  start pane for family_residence -->
                       <span slot="label"><i class="el-icon-s-home"></i> {{ $trans('app.family_residence') }} </span>
                           <p class="mb-2" >{{ $trans('app.All_family_members') }}</p>
                           <hr>
                        <div class="row">
                       <div class="col-md-3 ">
                                  <span class="demonstration" style="font-size:11px;">{{ $trans('app.number_rooms_the_dwelling') }} (٢٠١)</span>
                                  <el-input size="small" type="number" placeholder="عدد الحجارات" v-model="form.number_rooms_the_dwelling"></el-input>
                                   <span class="text-danger" v-if="errors['form.number_rooms_the_dwelling']">
                                      {{errors['form.number_rooms_the_dwelling'][0]}}
                                  </span>
                                  <el-input size="small" type="number" placeholder="مساحة المنزل  م2" v-model="form.number_rooms_the_dwelling2"></el-input>
                                  <span class="text-danger" v-if="errors['form.number_rooms_the_dwelling2']">
                                      {{errors['form.number_rooms_the_dwelling2'][0]}}
                                  </span>
                        </div>

                         <div class="col-md-3 mt-4">
                                   <span class="demonstration block" >{{ $trans('app.housing_type') }} (٢٠٢) </span>
                                  <el-select  v-model="form.housing_type" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="housing_type in housing_types"
                                      :key="housing_type.value"
                                      :label="housing_type.label"
                                      :value="housing_type.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.housing_type']">
                                      {{errors['form.housing_type'][0]}}
                                  </span>
                        </div>


                             <div class="col-md-4 mt-4">
                                   <span class="demonstration block">{{ $trans('app.home_ownership') }} (٢٠٣) </span>
                                  <el-select   v-model="form.home_ownership" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="home_ownership in home_ownerships"
                                      :key="home_ownership.value"
                                      :label="home_ownership.label"
                                      :value="home_ownership.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.home_ownership']">
                                      {{errors['form.home_ownership'][0]}}
                                  </span>
                              </div>

                                <div class="col-md-3 mt-4">
                                   <span class="demonstration block">{{ $trans('app.type_walls_dwelling') }} (٢٠٤) </span>
                                  <el-select   v-model="form.type_walls_dwelling" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="type_walls_dwelling in type_walls_dwellings"
                                      :key="type_walls_dwelling.value"
                                      :label="type_walls_dwelling.label"
                                      :value="type_walls_dwelling.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.type_walls_dwelling']">
                                      {{errors['form.type_walls_dwelling'][0]}}
                                  </span>
                              </div>


                                <div class="col-md-3 mt-3">
                                   <span class="demonstration block">{{ $trans('app.Type_flooring') }} (٢٠٥) </span>
                                  <el-select  v-model="form.Type_flooring" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="Type_flooring in Type_floorings"
                                      :key="Type_flooring.value"
                                      :label="Type_flooring.label"
                                      :value="Type_flooring.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Type_flooring']">
                                      {{errors['form.Type_flooring'][0]}}
                                  </span>
                              </div>

                                 <div class="col-md-4 mt-4">
                                   <span class="demonstration block">{{ $trans('app.type_roof') }} (٢٠٦) </span>
                                  <el-select   v-model="form.type_roof" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="type_roof in type_roofs"
                                      :key="type_roof.value"
                                      :label="type_roof.label"
                                      :value="type_roof.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.type_roof']">
                                      {{errors['form.type_roof'][0]}}
                                  </span>
                              </div>


                                <div class="col-md-3 mt-2">
                                   <span class="demonstration block">{{ $trans('app.material_roof_house') }} (٢٠٧) </span>
                                  <el-select   v-model="form.material_roof_house" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="material_roof_house in material_roof_houses"
                                      :key="material_roof_house.value"
                                      :label="material_roof_house.label"
                                      :value="material_roof_house.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.material_roof_house']">
                                      {{errors['form.material_roof_house'][0]}}
                                  </span>
                              </div>



                                <div class="col-md-3 mt-4">
                                   <span class="demonstration block">{{ $trans('app.material_wall_house') }} (٢٠٨) </span>
                                  <el-select   v-model="form.material_wall_house" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="material_wall_house in material_wall_houses"
                                      :key="material_wall_house.value"
                                      :label="material_wall_house.label"
                                      :value="material_wall_house.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.material_wall_house']">
                                      {{errors['form.material_wall_house'][0]}}
                                  </span>
                              </div>





                                <div class="col-md-4 mt-4">
                                   <span class="demonstration block">{{ $trans('app.water_source') }} (٢٠٩) </span>
                                  <el-select   v-model="form.water_source" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="water_source in water_sources"
                                      :key="water_source.value"
                                      :label="water_source.label"
                                      :value="water_source.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.material_wall_house']">
                                      {{errors['form.material_wall_house'][0]}}
                                  </span>
                                </div>
                                <div class="col-md-4 mt-2"  v-if="form.water_source == '٣'">
                                    <span class="demonstration">{{ $trans('app.anther_result') }}</span>
                                    <el-input size="small" placeholder="اكتب المصدر الأخر" v-model="form.water_source_anther" clearable ></el-input>
                                    <span class="text-danger" v-if="errors['form.water_source_anther']">
                                      {{errors['form.water_source_anther'][0]}}
                                  </span>
                                </div>

                                <div class="col-md-3 mt-3">
                                   <span class="demonstration block">{{ $trans('app.Having_toilet') }} (٢١٠) </span>
                                  <el-select   v-model="form.Having_toilet" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="Having_toilet in Having_toilets"
                                      :key="Having_toilet.value"
                                      :label="Having_toilet.label"
                                      :value="Having_toilet.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Having_toilet']">
                                      {{errors['form.Having_toilet'][0]}}
                                  </span>
                                </div>


                                <div class="col-md-3 mt-3">
                                   <span class="demonstration block">{{ $trans('app.toilet_type') }} (٢١١) </span>
                                  <el-select   v-model="form.toilet_type" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="toilet_type in toilet_types"
                                      :key="toilet_type.value"
                                      :label="toilet_type.label"
                                      :value="toilet_type.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.toilet_type']">
                                      {{errors['form.toilet_type'][0]}}
                                  </span>
                                </div>


                                 <div class="col-md-4 mt-3">
                                   <span class="demonstration block">{{ $trans('app.water_connection') }} (٢١٢) </span>
                                  <el-select   v-model="form.Water_connection" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="Water_connection in Water_connections"
                                      :key="Water_connection.value"
                                      :label="Water_connection.label"
                                      :value="Water_connection.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Water_connection']">
                                      {{errors['form.Water_connection'][0]}}
                                  </span>
                                </div>


                                 <div class="col-md-3 mt-3">
                                   <span class="demonstration block">{{ $trans('app.connected_electricity') }} (٢١٣) </span>
                                  <el-select   v-model="form.connected_electricity" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="connected_electricity in connected_electricitys"
                                      :key="connected_electricity.value"
                                      :label="connected_electricity.label"
                                      :value="connected_electricity.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.connected_electricity']">
                                      {{errors['form.connected_electricity'][0]}}
                                  </span>
                                </div>


                                 <div class="col-md-3 mt-3">
                                   <span class="demonstration block">{{ $trans('app.type_sewage') }} (٢١٤) </span>
                                  <el-select   v-model="form.type_sewage" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="type_sewage in type_sewages"
                                      :key="type_sewage.value"
                                      :label="type_sewage.label"
                                      :value="type_sewage.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.type_sewage']">
                                      {{errors['form.type_sewage'][0]}}
                                  </span>
                                </div>





                                 <div class="col-md-4 mt-4">
                                   <span class="demonstration block">{{ $trans('app.Having_kitchen') }} (٢١٥) </span>
                                  <el-select   v-model="form.Having_kitchen" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="having_kitchen in Having_toilets"
                                      :key="having_kitchen.value"
                                      :label="having_kitchen.label"
                                      :value="having_kitchen.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Having_kitchen']">
                                      {{errors['form.Having_kitchen'][0]}}
                                  </span>
                                </div>


                                <div class="col-md-3 mt-1">
                                   <span class="demonstration block">{{ $trans('app.used_kitchen_fuel') }} (٢١٦) </span>
                                  <el-select   v-model="form.used_kitchen_fuel" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="used_kitchen_fuel in used_kitchen_fuels"
                                      :key="used_kitchen_fuel.value"
                                      :label="used_kitchen_fuel.label"
                                      :value="used_kitchen_fuel.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.used_kitchen_fuel']">
                                      {{errors['form.used_kitchen_fuel'][0]}}
                                  </span>
                                </div>


                                <div class="col-md-3 mt-3">
                                   <span class="demonstration block">{{ $trans('app.Garbage_collection_method') }} (٢١٧) </span>
                                  <el-select   v-model="form.Garbage_collection_method" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="Garbage_collection_method in Garbage_collection_methods"
                                      :key="Garbage_collection_method.value"
                                      :label="Garbage_collection_method.label"
                                      :value="Garbage_collection_method.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.Garbage_collection_method']">
                                      {{errors['form.Garbage_collection_method'][0]}}
                                  </span>
                                </div>


                                <div class="col-md-4 ">
                                   <span class="demonstration block" style="font-size:13px;">{{ $trans('app.mechanical_ration_card') }}  </span>
                                  <span class="demonstration" style="font-size:12px;">{{ $trans('app.case_paper_card') }} (٢١٩) </span>
                                  <el-select   v-model="form.mechanical_ration_cards" placeholder="اختر الاجابة" >
                                    <el-option
                                      v-for="mechanical_ration_card in mechanical_ration_cards"
                                      :key="mechanical_ration_card.value"
                                      :label="mechanical_ration_card.label"
                                      :value="mechanical_ration_card.value">
                                    </el-option>
                                  </el-select>
                                  <span class="text-danger" v-if="errors['form.mechanical_ration_cards']">
                                      {{errors['form.mechanical_ration_cards'][0]}}
                                  </span>
                                </div>


                                  <div class="col-md-3 mt-3">
                                  <span class="demonstration block">{{ $trans('app.ration_card_number') }} (٢١٨) </span>
                                   <el-input  type="number" placeholder="يتكون من ١٢رقم" v-model="form.ration_card_number" clearable ></el-input>
                                   <span class="text-danger" v-if="errors['form.ration_card_number']">
                                      {{errors['form.ration_card_number'][0]}}
                                  </span>

                                    <el-input  size="small" placeholder="إسم مكتب التموين (أن وجد)" v-model="form.Supply_office_name" clearable ></el-input>
                                  <span class="text-danger" v-if="errors['form.Supply_office_name']">
                                      {{errors['form.Supply_office_name'][0]}}
                                  </span>
                                </div>

                        </div>
                       <hr>
                          <div class="row">
                            <div class="col-md-3"></div>
                            <p class="col-md-6 mb-4 text-center" >{{ $trans('app.Family_property') }}</p>
                          </div>




<table class="table table-bordered table-responsive  border-primary" >
  <thead>
    <tr>
      <th scope="col">{{ $trans('app.clause') }} </th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
    </tr>
  </thead>
  <tbody >
        <tr>
        <td scope="row">
              <span class="demonstration block">{{ $trans('app.Refrigerator') }} </span>
          </td>
                <td>
                      <div class="width-table">
                    <el-select   v-model="form.Refrigerator" placeholder="نعم/لا" >
                      <el-option
                        v-for="Refrigerator in yesOrno"
                        :key="Refrigerator.value"
                        :label="Refrigerator.label"
                        :value="Refrigerator.value">
                      </el-option>
                    </el-select>
                    <span class="text-danger" v-if="errors['form.Refrigerator']">
                        {{errors['form.Refrigerator'][0]}}
                    </span>
                      </div>
              </td>
                <td>
                    <span class="demonstration block">{{ $trans('app.Agricultural_Land') }}  </span>
                </td>
                <td>
                  <div class="width-table">
                    <el-select   v-model="form.Agricultural_Land" placeholder="نعم/لا" >
                              <el-option
                                v-for="Agricultural_Land in yesOrno"
                                :key="Agricultural_Land.value"
                                :label="Agricultural_Land.label"
                                :value="Agricultural_Land.value">
                              </el-option>
                            </el-select>
                            <span class="text-danger" v-if="errors['form.Agricultural_Land']">
                                {{errors['form.Agricultural_Land'][0]}}
                            </span>
                  </div>
                </td>

                <td>
                  <span class="demonstration block">{{ $trans('app.taxi') }}  </span>
                </td>
                <td>
                   <div class="width-table">
                      <el-select   v-model="form.taxi" placeholder="نعم/لا" >
                        <el-option
                          v-for="taxi in yesOrno"
                          :key="taxi.value"
                          :label="taxi.label"
                          :value="taxi.value">
                        </el-option>
                      </el-select>
                      <span class="text-danger" v-if="errors['form.taxi']">
                          {{errors['form.taxi'][0]}}
                      </span>
                   </div>
                </td>


    </tr>
     <tr>
                    <td scope="row">
                            <span class="demonstration block">{{ $trans('app.adaptation') }}  </span>
                    </td>
                    <td>
                       <div class="width-table">
                          <el-select   v-model="form.adaptation" placeholder="نعم/لا" >
                            <el-option
                              v-for="adaptation in yesOrno"
                              :key="adaptation.value"
                              :label="adaptation.label"
                              :value="adaptation.value">
                            </el-option>
                          </el-select>
                          <span class="text-danger" v-if="errors['form.adaptation']">
                              {{errors['form.adaptation'][0]}}
                          </span>
                       </div>
               </td>
      <td>
        <span class="demonstration block">{{ $trans('app.number_acres') }}  </span>
      </td>
      <td>
                      <el-input size="small" type="number" placeholder="العدد" v-model="form.number_acres1"  ></el-input>
                      <span class="text-danger" v-if="errors['form.number_acres1']">
                          {{errors['form.number_acres1'][0]}}
                      </span>
        </td>



          <td>
              <span class="demonstration block">{{ $trans('app.semitransportation_car') }}  </span>
          </td>
          <td>
             <div class="width-table">
                 <el-select   v-model="form.semitransportation_car" placeholder="نعم/لا" >
                        <el-option
                          v-for="semitransportation_car in yesOrno"
                          :key="semitransportation_car.value"
                          :label="semitransportation_car.label"
                          :value="semitransportation_car.value">
                        </el-option>
                      </el-select>
                      <span class="text-danger" v-if="errors['form.semitransportation_car']">
                          {{errors['form.semitransportation_car'][0]}}
                      </span>
             </div>
          </td>
    </tr>
    <tr>
            <td scope="row" >
              <div class="mt-4">
                    <span class="demonstration block">{{ $trans('app.domestic_birds') }} </span>
              </div>
            </td>
                    <td>

                      <div class="width-table mt-4">
                      <el-select   v-model="form.domestic_birds" placeholder="نعم/لا" >
                        <el-option
                          v-for="domestic_birds in yesOrno"
                          :key="domestic_birds.value"
                          :label="domestic_birds.label"
                          :value="domestic_birds.value">
                        </el-option>
                      </el-select>
                      <span class="text-danger" v-if="errors['form.domestic_birds']">
                          {{errors['form.domestic_birds'][0]}}
                      </span>
                      </div>
               </td>
      <td>
        <div>
         <span class="demonstration block">{{ $trans('app.Ordinary_washing_machine') }} </span>
         </div>
        <div class="mt-4">
        <span class="demonstration block">{{ $trans('app.Automatic_washing_machine') }} </span>
        </div>
        <div class="mt-3">
        <span class="demonstration block">{{ $trans('app.Smart_mobile_phone') }} </span>
        </div>
      </td>
      <td >
      <div class="width-table">
         <el-select   v-model="form.Ordinary_washing_machine" placeholder="نعم/لا" >
            <el-option
              v-for="Ordinary_washing_machine in yesOrno"
              :key="Ordinary_washing_machine.value"
              :label="Ordinary_washing_machine.label"
              :value="Ordinary_washing_machine.value">
            </el-option>
          </el-select>
            <span class="text-danger" v-if="errors['form.Ordinary_washing_machine']">
                {{errors['form.Ordinary_washing_machine'][0]}}
            </span>


            <div class="mt-1">
                <el-select   v-model="form.Automatic_washing_machine" placeholder="نعم/لا" >
                <el-option
                  v-for="Automatic_washing_machine in yesOrno"
                  :key="Automatic_washing_machine.value"
                  :label="Automatic_washing_machine.label"
                  :value="Automatic_washing_machine.value">
                </el-option>
                </el-select>
                <span class="text-danger" v-if="errors['form.Automatic_washing_machine']">
                    {{errors['form.Automatic_washing_machine'][0]}}
                </span>
          </div>
          <div class="width-table mt-1">
                <el-select   v-model="form.Smart_mobile_phone" placeholder="نعم/لا" >
                <el-option
                  v-for="Smart_mobile_phone in yesOrno"
                  :key="Smart_mobile_phone.value"
                  :label="Smart_mobile_phone.label"
                  :value="Smart_mobile_phone.value">
                </el-option>
                </el-select>
                  <span class="text-danger" v-if="errors['form.Smart_mobile_phone']">
                      {{errors['form.Smart_mobile_phone'][0]}}
                  </span>
            </div>
            </div>
          </td>

       <td>
              <div class="mt-4">
               <span class="demonstration block">{{ $trans('app.cattle_heads') }} </span>
               </div>
                <div class="mt-4">
               <span class="demonstration block">{{ $trans('app.their_number') }} </span>
               </div>
    </td>
      <td >
        <div class="width-table mt-4" >
                <el-select   v-model="form.cattle_heads" placeholder="نعم/لا" >
                <el-option
                  v-for="cattle_heads in yesOrno"
                  :key="cattle_heads.value"
                  :label="cattle_heads.label"
                  :value="cattle_heads.value">
                </el-option>
                </el-select>
              <span class="text-danger" v-if="errors['form.cattle_heads']">
                  {{errors['form.cattle_heads'][0]}}
              </span>

         <div class="width-table mt-2" v-if="form.cattle_heads = '١'">
               <el-input  type="number" placeholder="العدد" v-model="form.their_number"   max="100"></el-input>
              <span class="text-danger" v-if="errors['form.their_number']">
                  {{errors['form.their_number'][0]}}
              </span>
        </div>
        </div>
      </td>

    </tr>
  </tbody>


</table>


<table class="table table-bordered table-responsive  border-primary" > <!--  start table two -->
  <thead>
    <tr>
      <th scope="col">{{ $trans('app.clause') }} </th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>

    </tr>
  </thead>
  <tbody >
                 <tr>
                  <td scope="row">
                          <span class="demonstration block">{{ $trans('app.bed') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.bed" placeholder="نعم/لا" >
                          <el-option
                            v-for="bed in yesOrno"
                            :key="bed.value"
                            :label="bed.label"
                            :value="bed.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['form.bed']">
                            {{errors['form.bed'][0]}}
                        </span>
                    </div>
                  </td>
              <td>
                <span class="demonstration block">{{ $trans('app.Rank') }}  </span>
              </td>
              <td>
                    <div class="width-table">
                        <el-select   v-model="form.Rank" placeholder="نعم/لا" >
                          <el-option
                            v-for="Rank in yesOrno"
                            :key="Rank.value"
                            :label="Rank.label"
                            :value="Rank.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['form.Rank']">
                            {{errors['form.Rank'][0]}}
                        </span>
                    </div>
                </td>



                  <td>
                      <span class="demonstration block">{{ $trans('app.Blankets') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.Blankets" placeholder="نعم/لا" >
                                <el-option
                                  v-for="Blankets in yesOrno"
                                  :key="Blankets.value"
                                  :label="Blankets.label"
                                  :value="Blankets.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.Blankets']">
                                  {{errors['form.Blankets'][0]}}
                              </span>
                    </div>
                  </td>

                  <td>
                      <span class="demonstration block">{{ $trans('app.cupbord') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.cupbord" placeholder="نعم/لا" >
                                <el-option
                                  v-for="cupbord in yesOrno"
                                  :key="cupbord.value"
                                  :label="cupbord.label"
                                  :value="cupbord.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.cupbord']">
                                  {{errors['form.cupbord'][0]}}
                              </span>
                    </div>
                  </td>


          </tr>
          <tr>
                    <td>
                      <span class="demonstration block">{{ $trans('app.sofa') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.sofa" placeholder="نعم/لا" >
                                <el-option
                                  v-for="sofa in yesOrno"
                                  :key="sofa.value"
                                  :label="sofa.label"
                                  :value="sofa.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.sofa']">
                                  {{errors['form.sofa'][0]}}
                              </span>
                    </div>
                  </td>


                  <td>
                      <span class="demonstration block">{{ $trans('app.sewing_machine') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.sewing_machine" placeholder="نعم/لا" >
                                <el-option
                                  v-for="sewing_machine in yesOrno"
                                  :key="sewing_machine.value"
                                  :label="sewing_machine.label"
                                  :value="sewing_machine.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.sewing_machine']">
                                  {{errors['form.sewing_machine'][0]}}
                              </span>
                    </div>
                  </td>


                  <td>
                      <span class="demonstration block">{{ $trans('app.fan') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.fan" placeholder="نعم/لا" >
                                <el-option
                                  v-for="fan in yesOrno"
                                  :key="fan.value"
                                  :label="fan.label"
                                  :value="fan.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.fan']">
                                  {{errors['form.fan'][0]}}
                              </span>
                    </div>
                  </td>

                  <td>
                      <span class="demonstration block">{{ $trans('app.cab') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.cab" placeholder="نعم/لا" >
                                <el-option
                                  v-for="cab in yesOrno"
                                  :key="cab.value"
                                  :label="cab.label"
                                  :value="cab.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.cab']">
                                  {{errors['form.cab'][0]}}
                              </span>
                    </div>
                  </td>
          </tr>

          <tr>
                   <td >
                      <span class="demonstration block">{{ $trans('app.Rent_agricultural_land_others') }}  </span>
                  </td>
                  <td colspan="3">
                    <div class="width-table">
                        <el-select   v-model="form.Rent_agricultural_land_others" placeholder="نعم/لا" >
                                <el-option
                                  v-for="Rent_agricultural_land_others in yesOrno"
                                  :key="Rent_agricultural_land_others.value"
                                  :label="Rent_agricultural_land_others.label"
                                  :value="Rent_agricultural_land_others.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.Rent_agricultural_land_others']">
                                  {{errors['form.Rent_agricultural_land_others'][0]}}
                              </span>
                    </div>
                  </td>

                    <td  v-if="form.Rent_agricultural_land_others ==  '١'">
                      <span class="demonstration block">{{ $trans('app.The_number_acres') }}  </span>
                  </td>
                  <td colspan="3" v-if="form.Rent_agricultural_land_others ==  '١'">
                    <div class="width-table">
                         <el-input  type="number" placeholder="العدد" v-model="form.number_acres2"   ></el-input>
                              <span class="text-danger" v-if="errors['form.number_acres2']">
                                  {{errors['form.number_acres2'][0]}}
                              </span>
                    </div>
                  </td>
          </tr>
 </tbody>
</table>     <!--  End table two -->




<table class="table table-bordered table-responsive  border-primary" > <!--  start table two -->
  <thead>
    <tr>
      <th scope="col">{{ $trans('app.clause') }} </th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
      <th scope="col">{{ $trans('app.clause') }}</th>
      <th scope="col">{{ $trans('app.choose') }}</th>
    </tr>
  </thead>
  <tbody>
               <tr>
                  <td scope="row">
                          <span class="demonstration block">{{ $trans('app.Tuk_Tuk') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.Tuk_Tuk" placeholder="نعم/لا" >
                          <el-option
                            v-for="Tuk_Tuk in yesOrno"
                            :key="Tuk_Tuk.value"
                            :label="Tuk_Tuk.label"
                            :value="Tuk_Tuk.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['form.Tuk_Tuk']">
                            {{errors['form.Tuk_Tuk'][0]}}
                        </span>
                    </div>
                  </td>

              <td>
                <span class="demonstration block">{{ $trans('app.motorcycle') }}  </span>
              </td>
              <td>
                    <div class="width-table">
                        <el-select   v-model="form.motorcycle" placeholder="نعم/لا" >
                          <el-option
                            v-for="motorcycle in yesOrno"
                            :key="motorcycle.value"
                            :label="motorcycle.label"
                            :value="motorcycle.value">
                          </el-option>
                        </el-select>
                        <span class="text-danger" v-if="errors['form.motorcycle']">
                            {{errors['form.motorcycle'][0]}}
                        </span>
                    </div>

                </td>



                  <td>
                      <span class="demonstration block">{{ $trans('app.kitchen') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.kitchen" placeholder="نعم/لا" >
                                <el-option
                                  v-for="kitchen in yesOrno"
                                  :key="kitchen.value"
                                  :label="kitchen.label"
                                  :value="kitchen.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.kitchen']">
                                  {{errors['form.kitchen'][0]}}
                              </span>
                    </div>
                  </td>

                  <td>
                      <span class="demonstration block">{{ $trans('app.land_line') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.land_line" placeholder="نعم/لا" >
                                <el-option
                                  v-for="land_line in yesOrno"
                                  :key="land_line.value"
                                  :label="land_line.label"
                                  :value="land_line.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.land_line']">
                                  {{errors['form.land_line'][0]}}
                              </span>
                    </div>
                  </td>

          </tr>
          <tr>
                <td>
                      <span class="demonstration block">{{ $trans('app.Tractor') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.Tractor" placeholder="نعم/لا" >
                                <el-option
                                  v-for="Tractor in yesOrno"
                                  :key="Tractor.value"
                                  :label="Tractor.label"
                                  :value="Tractor.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.Tractor']">
                                  {{errors['form.Tractor'][0]}}
                              </span>
                    </div>
                  </td>


                  <td>
                      <span class="demonstration block">{{ $trans('app.private_car') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.private_car" placeholder="نعم/لا" >
                                <el-option
                                  v-for="private_car in yesOrno"
                                  :key="private_car.value"
                                  :label="private_car.label"
                                  :value="private_car.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.private_car']">
                                  {{errors['form.private_car'][0]}}
                              </span>
                    </div>
                  </td>

                 <td>
                      <span class="demonstration block">{{ $trans('app.sheep/goats') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.sheepgoats" placeholder="نعم/لا" >
                                <el-option
                                  v-for="sheepgoats in yesOrno"
                                  :key="sheepgoats.value"
                                  :label="sheepgoats.label"
                                  :value="sheepgoats.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.sheepgoats']">
                                  {{errors['form.sheepgoats'][0]}}
                              </span>
                    </div>
                  </td>


                  <td>
                      <span class="demonstration block">{{ $trans('app.color_TV') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.color_TV" placeholder="نعم/لا" >
                                <el-option
                                  v-for="color_TV in yesOrno"
                                  :key="color_TV.value"
                                  :label="color_TV.label"
                                  :value="color_TV.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.color_TV']">
                                  {{errors['form.color_TV'][0]}}
                              </span>
                    </div>
                  </td>
            </tr>

          <tr>

                  <td>
                      <span class="demonstration block">{{ $trans('app.computer') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.computer" placeholder="نعم/لا" >
                                <el-option
                                  v-for="computer in yesOrno"
                                  :key="computer.value"
                                  :label="computer.label"
                                  :value="computer.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.computer']">
                                  {{errors['form.computer'][0]}}
                              </span>
                    </div>
                  </td>


                  <td>
                      <span class="demonstration block">{{ $trans('app.shower_fitting') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.shower_fitting" placeholder="نعم/لا" >
                                <el-option
                                  v-for="shower_fitting in yesOrno"
                                  :key="shower_fitting.value"
                                  :label="shower_fitting.label"
                                  :value="shower_fitting.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.shower_fitting']">
                                  {{errors['form.shower_fitting'][0]}}
                              </span>
                    </div>
                  </td>



                  <td>
                      <span class="demonstration block">{{ $trans('app.water_heater') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.water_heater" placeholder="نعم/لا" >
                                <el-option
                                  v-for="water_heater in yesOrno"
                                  :key="water_heater.value"
                                  :label="water_heater.label"
                                  :value="water_heater.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.water_heater']">
                                  {{errors['form.water_heater'][0]}}
                              </span>
                    </div>
                  </td>



                   <td>
                      <span class="demonstration block">{{ $trans('app.Cooker_cylinder') }}  </span>
                  </td>
                  <td>
                    <div class="width-table">
                        <el-select   v-model="form.Cooker_cylinder" placeholder="نعم/لا" >
                                <el-option
                                  v-for="Cooker_cylinder in yesOrno"
                                  :key="Cooker_cylinder.value"
                                  :label="Cooker_cylinder.label"
                                  :value="Cooker_cylinder.value">
                                </el-option>
                              </el-select>
                              <span class="text-danger" v-if="errors['form.Cooker_cylinder']">
                                  {{errors['form.Cooker_cylinder'][0]}}
                              </span>
                    </div>
                  </td>


          </tr>

  </tbody>
</table>

                        <hr>
                          <div class="row">
                            <div class="col-md-3"></div>
                            <p class="col-md-6 mb-4 text-center" >{{ $trans('app.family_support') }}</p>
                          </div>

                   <div class="row">
                          <div class="col-md-6">
                        <table class="table table-bordered table-responsive  border-primary" > <!--  start table three -->
                          <thead>
                            <tr>
                              <th scope="col">{{ $trans('app.clause') }} </th>
                              <th scope="col">{{ $trans('app.choose') }}</th>

                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td scope="row">
                                      <span class="demonstration block">{{ $trans('app.headfamily_work_abroad') }}  (٢٢١)</span>
                                  </td>
                                  <td>
                                    <div class="width-table">
                                          <el-select   v-model="form.headfamily_work_abroad" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="headfamily_work_abroad in yesOrno"
                                            :key="headfamily_work_abroad.value"
                                            :label="headfamily_work_abroad.label"
                                            :value="headfamily_work_abroad.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.headfamily_work_abroad']">
                                            {{errors['form.headfamily_work_abroad'][0]}}
                                        </span>
                                  </div>
                                  </td>
                              </tr>

                              <tr>
                                  <td scope="row">
                                      <span class="demonstration block">{{ $trans('app.individual_beneficiary') }}  (٢٢٢)</span>
                                  </td>
                                  <td>
                                    <div class="width-table">
                                          <el-select   v-model="form.individual_beneficiary" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="individual_beneficiary in yesOrno"
                                            :key="individual_beneficiary.value"
                                            :label="individual_beneficiary.label"
                                            :value="individual_beneficiary.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.individual_beneficiary']">
                                            {{errors['form.individual_beneficiary'][0]}}
                                        </span>
                                  </div>
                                  </td>
                              </tr>

                          </tbody>
                        </table><!--  End table three -->
                      </div>

                        <div class="col-md-5" v-if="form.individual_beneficiary !== '٢'">
                        <table class="table table-bordered table-responsive  border-primary" > <!--  start table four -->
                          <thead>
                            <tr>
                              <th scope="col">{{ $trans('app.clause') }} </th>
                              <th scope="col">{{ $trans('app.choose') }}</th>

                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td scope="row">
                                      <span class="demonstration block">{{ $trans('app.cash_support_program') }}  (٢٢٣)</span>
                                  </td>
                                  <td>
                                    <div class="width-table">
                                          <el-select   v-model="form.cash_support_program" placeholder="اختر برنامج الدعم" >
                                          <el-option
                                            v-for="cash_support_program in cash_support_programs"
                                            :key="cash_support_program.value"
                                            :label="cash_support_program.label"
                                            :value="cash_support_program.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.cash_support_program']">
                                            {{errors['form.cash_support_program'][0]}}
                                        </span>
                                  </div>
                                  </td>
                              </tr>



                          </tbody>
                        </table><!--  End table four -->
                      </div>
                   </div>
                        </el-tab-pane>


                      <el-tab-pane>  <!--  start for Reproductive Health -->
                            <span slot="label"><i class="fas fa-baby"></i>  {{ $trans('app.Reproductive_Health') }}  </span>

                            <table class="table table-bordered table-responsive  border-primary mt-4" > <!--  start table Reproductive_Health -->
                          <thead>
                            <tr>
                              <th scope="col">{{ $trans('app.num') }} </th>
                              <th scope="col">{{ $trans('app.pointer') }}</th>
                              <th scope="col">{{ $trans('app.Mrs_1') }}</th>
                              <th scope="col">{{ $trans('app.Mrs_2') }}</th>
                              <th scope="col">{{ $trans('app.Mrs_3') }}</th>
                              <th scope="col">{{ $trans('app.Notes') }}</th>


                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td scope="row"><!-- start mrs. 1 -->
                                      <span class="demonstration block"> ٣٠٠	</span>
                                  </td>
                                  <td>
                                    {{ $trans('app.number_family_table') }} : <br>
                                   <p class="mt-3"> {{ $trans('app.name') }} : </p>
                                  </td>
                                  <td>
                                    <div class="width-table">
                                    <el-input size="small" type="number" placeholder="رقم السطر" v-model="form.number_family_table1"  ></el-input>
                                      <el-input size="small" class="mt-2" placeholder="اسم السيدة" v-model="form.name_in_table1"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.number_family_table1']">
                                          {{errors['form.number_family_table'][0]}}
                                      </span>

                                      <span class="text-danger" v-if="errors['form.name_in_table1']">
                                          {{errors['form.name_in_table1'][0]}}
                                      </span>
                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                      <el-input size="small" type="number" placeholder="رقم السطر" v-model="form.number_family_table2"  ></el-input>
                                        <el-input size="small" class="mt-2" placeholder="اسم السيدة" v-model="form.name_in_table2"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.number_family_table2']">
                                            {{errors['form.name_in_table2'][0]}}
                                        </span>

                                        <span class="text-danger" v-if="errors['form.name_in_table2']">
                                            {{errors['form.name_in_table2'][0]}}
                                        </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-input size="small" type="number" placeholder="رقم السطر" v-model="form.number_family_table3"  ></el-input>
                                        <el-input size="small" class="mt-2" placeholder="اسم السيدة" v-model="form.name_in_table3"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.number_family_table3']">
                                            {{errors['form.name_in_table3'][0]}}
                                        </span>

                                        <span class="text-danger" v-if="errors['form.name_in_table3']">
                                            {{errors['form.name_in_table3'][0]}}
                                        </span>
                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.name_in_table_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.name_in_table_Notes']">
                                            {{errors['form.name_in_table_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>



                               <tr> <!-- start mrs. 2 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠١	</span>
                                  </td>
                                  <td>
                                 <p class="text-size">  {{ $trans('app.family_planning_method') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                     <el-select   v-model="form.family_planning_method1" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="family_planning_method1 in yesOrno"
                                            :key="family_planning_method1.value"
                                            :label="family_planning_method1.label"
                                            :value="family_planning_method1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.family_planning_method']">
                                          {{errors['form.family_planning_method'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                     <el-select   v-model="form.family_planning_method2" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="family_planning_method2 in yesOrno"
                                            :key="family_planning_method2.value"
                                            :label="family_planning_method2.label"
                                            :value="family_planning_method2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.family_planning_method2']">
                                          {{errors['form.family_planning_method2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.family_planning_method3" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="family_planning_method3 in yesOrno"
                                            :key="family_planning_method3.value"
                                            :label="family_planning_method3.label"
                                            :value="family_planning_method3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.family_planning_method3']">
                                          {{errors['form.family_planning_method3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.family_planning_method_Notes"  ></el-input>
                                                <span class="text-danger" v-if="errors['form.family_planning_method_Notes']">
                                                    {{errors['form.family_planning_method_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>



                                <tr v-if="form.family_planning_method1 !== '٢' || form.family_planning_method2  !== '٢' || form.family_planning_method3 !== '٢'"> <!-- start mrs. 3 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٢	</span>
                                  </td>
                                  <td>
                                  <p class="text-size">  {{ $trans('app.first_time_used') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                       <el-input size="small" type="number" placeholder="عدد الاطفال" v-model="form.first_time_used1"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.first_time_used1']">
                                          {{errors['form.first_time_used1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                         <el-input size="small" type="number" placeholder="عدد الاطفال" v-model="form.first_time_used2"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.first_time_used2']">
                                          {{errors['form.first_time_used2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                         <el-input size="small" type="number" placeholder="عدد الاطفال" v-model="form.first_time_used3"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.first_time_used3']">
                                          {{errors['form.first_time_used3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.first_time_used_Notes"  ></el-input>
                                                <span class="text-danger" v-if="errors['form.first_time_used_Notes']">
                                                    {{errors['form.first_time_used_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>

                                  <tr v-if="form.family_planning_method1 !== '٢' || form.family_planning_method2  !== '٢' || form.family_planning_method3 !== '٢'"> <!-- start mrs. 4 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٣	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.sed_first_time') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                     <el-select   v-model="form.sed_first_time1" placeholder="اختر الوسيلة" >
                                          <el-option
                                            v-for="sed_first_time1 in sed_first_times"
                                            :key="sed_first_time1.value"
                                            :label="sed_first_time1.label"
                                            :value="sed_first_time1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.sed_first_time1']">
                                          {{errors['form.sed_first_time1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                     <el-select   v-model="form.sed_first_time2" placeholder="اختر الوسيلة" >
                                          <el-option
                                            v-for="sed_first_time2 in sed_first_times"
                                            :key="sed_first_time2.value"
                                            :label="sed_first_time2.label"
                                            :value="sed_first_time2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.sed_first_time2']">
                                          {{errors['form.sed_first_time2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.sed_first_time3" placeholder="اختر الوسيلة" >
                                          <el-option
                                            v-for="sed_first_time3 in sed_first_times"
                                            :key="sed_first_time3.value"
                                            :label="sed_first_time3.label"
                                            :value="sed_first_time3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.sed_first_time3']">
                                          {{errors['form.sed_first_time3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.sed_first_time_Notes"  ></el-input>
                                                <span class="text-danger" v-if="errors['form.sed_first_time_Notes']">
                                                    {{errors['form.sed_first_time_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>


                                  <tr> <!-- start mrs. 4 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٤	</span>
                                  </td>
                                  <td>
                                   <p class="text-size">  {{ $trans('app.currently_pregnant') }} </p>
                                  </td>
                                  <td>
                                    <div class="width-table">
                                     <el-select   v-model="form.currently_pregnant1" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="currently_pregnant1 in yesOrno"
                                            :key="currently_pregnant1.value"
                                            :label="currently_pregnant1.label"
                                            :value="currently_pregnant1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.currently_pregnant1']">
                                          {{errors['form.currently_pregnant1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                     <el-select   v-model="form.currently_pregnant2" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="currently_pregnant2 in yesOrno"
                                            :key="currently_pregnant2.value"
                                            :label="currently_pregnant2.label"
                                            :value="currently_pregnant2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.currently_pregnant2']">
                                          {{errors['form.currently_pregnant2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.currently_pregnant3" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="currently_pregnant3 in yesOrno"
                                            :key="currently_pregnant3.value"
                                            :label="currently_pregnant3.label"
                                            :value="currently_pregnant3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.currently_pregnant3']">
                                          {{errors['form.currently_pregnant3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.currently_pregnant_Notes"  ></el-input>
                                                <span class="text-danger" v-if="errors['form.currently_pregnant_Notes']">
                                                    {{errors['form.currently_pregnant_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>




                                <tr> <!-- start mrs. 6 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٥	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.method_family_planning') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                     <el-select   v-model="form.method_family_planning1" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="method_family_planning1 in yesOrno"
                                            :key="method_family_planning1.value"
                                            :label="method_family_planning1.label"
                                            :value="method_family_planning1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.method_family_planning1']">
                                          {{errors['form.method_family_planning1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                     <el-select   v-model="form.method_family_planning2" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="method_family_planning2 in yesOrno"
                                            :key="method_family_planning2.value"
                                            :label="method_family_planning2.label"
                                            :value="method_family_planning2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.method_family_planning2']">
                                          {{errors['form.method_family_planning2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.method_family_planning3" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="method_family_planning3 in yesOrno"
                                            :key="method_family_planning3.value"
                                            :label="method_family_planning3.label"
                                            :value="method_family_planning3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.method_family_planning3']">
                                          {{errors['form.method_family_planning3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.method_family_planning_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.method_family_planning_Notes']">
                                                    {{errors['form.method_family_planning_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>


                             <tr v-if="form.method_family_planning1 !== '٢' || form.method_family_planning2  !== '٢' || form.method_family_planning3 !== '٢'"> <!-- start mrs. 7 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٦	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.method_you_use') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table"  v-if="form.method_family_planning1 !== '٢' ">
                                     <el-select   v-model="form.method_you_use1" placeholder="اختر الوسيله" >
                                          <el-option
                                            v-for="method_you_use1 in sed_first_times"
                                            :key="method_you_use1.value"
                                            :label="method_you_use1.label"
                                            :value="method_you_use1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.method_you_use1']">
                                          {{errors['form.method_you_use1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table" v-if="form.method_family_planning2 !== '٢' ">
                                     <el-select   v-model="form.method_you_use2" placeholder="اختر الوسيله" >
                                          <el-option
                                            v-for="method_you_use2 in sed_first_times"
                                            :key="method_you_use2.value"
                                            :label="method_you_use2.label"
                                            :value="method_you_use2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.method_you_use2']">
                                          {{errors['form.method_you_use2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table" v-if="form.method_family_planning3 !== '٢' ">
                                      <el-select   v-model="form.method_you_use3" placeholder="اختر الوسيله" >
                                          <el-option
                                            v-for="method_you_use3 in sed_first_times"
                                            :key="method_you_use3.value"
                                            :label="method_you_use3.label"
                                            :value="method_you_use3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.method_you_use3']">
                                          {{errors['form.method_you_use3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.method_you_use_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.method_you_use_Notes']">
                                                    {{errors['form.method_you_use_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>



                               <tr> <!-- start mrs. 8 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٧	</span>
                                  </td>
                                  <td>
                                    <p class="text-size"> {{ $trans('app.last_method_used') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                     <el-select   v-model="form.last_method_used1" placeholder="اختر الوسيله" >
                                          <el-option
                                            v-for="last_method_used1 in last_method_used"
                                            :key="last_method_used1.value"
                                            :label="last_method_used1.label"
                                            :value="last_method_used1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.last_method_used1']">
                                          {{errors['form.last_method_used1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                     <el-select   v-model="form.last_method_used2" placeholder="اختر الوسيله" >
                                          <el-option
                                            v-for="last_method_used2 in sed_first_times"
                                            :key="last_method_used2.value"
                                            :label="last_method_used2.label"
                                            :value="last_method_used2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.last_method_used2']">
                                          {{errors['form.last_method_used2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.last_method_used3" placeholder="اختر الوسيله" >
                                          <el-option
                                            v-for="last_method_used3 in sed_first_times"
                                            :key="last_method_used3.value"
                                            :label="last_method_used3.label"
                                            :value="last_method_used3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.last_method_used3']">
                                          {{errors['form.last_method_used3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.last_method_used_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.last_method_used_Notes']">
                                                    {{errors['form.last_method_used_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>




                               <tr> <!-- start mrs. 8 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٨	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.want_have_children') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                     <el-select   v-model="form.want_have_children1" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="want_have_children1 in yesOrno"
                                            :key="want_have_children1.value"
                                            :label="want_have_children1.label"
                                            :value="want_have_children1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.want_have_children1']">
                                          {{errors['form.want_have_children1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                     <el-select   v-model="form.want_have_children2" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="want_have_children2 in yesOrno"
                                            :key="want_have_children2.value"
                                            :label="want_have_children2.label"
                                            :value="want_have_children2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.want_have_children2']">
                                          {{errors['form.want_have_children2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.want_have_children3" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="want_have_children3 in yesOrno"
                                            :key="want_have_children3.value"
                                            :label="want_have_children3.label"
                                            :value="want_have_children3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.want_have_children3']">
                                          {{errors['form.want_have_children3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.want_have_children_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.want_have_children_Notes']">
                                                    {{errors['form.want_have_children_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>


                              <tr  v-if="form.want_have_children1 !== '١' || form.want_have_children2 !== '١' || form.want_have_children3 !== '١'" > <!-- start mrs. 9 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣٠٩	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.have_another_child') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table" v-if="form.want_have_children1 !== '١'">
                                       <el-input  type="textarea" placeholder="الرد" v-model="form.have_another_child1"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.have_another_child1']">
                                          {{errors['form.have_another_child1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table" v-if="form.want_have_children2 !== '١'">
                                       <el-input  type="textarea" placeholder="الرد" v-model="form.have_another_child2"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.have_another_child2']">
                                          {{errors['form.have_another_child2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table" v-if="form.want_have_children3 !== '١'">
                                        <el-input  type="textarea" placeholder="الرد" v-model="form.have_another_child3"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.have_another_child3']">
                                          {{errors['form.have_another_child3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.have_another_child_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.have_another_child_Notes']">
                                                    {{errors['form.have_another_child_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>



                                  <tr  v-if="form.want_have_children1 !== '١' || form.want_have_children2 !== '١' || form.want_have_children3 !== '١'"> <!-- start mrs. 10 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣١٠	</span>
                                  </td>
                                  <td>
                                  <p class="text-size">  {{ $trans('app.want_family_planning') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table"  v-if="form.want_have_children1 !== '١'">
                                       <el-select   v-model="form.want_family_planning1" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="want_family_planning1 in yesOrno"
                                            :key="want_family_planning1.value"
                                            :label="want_family_planning1.label"
                                            :value="want_family_planning1.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.want_family_planning1']">
                                          {{errors['form.want_family_planning1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table"  v-if="form.want_have_children2 !== '١'">
                                          <el-select   v-model="form.want_family_planning2" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="want_family_planning2 in yesOrno"
                                            :key="want_family_planning2.value"
                                            :label="want_family_planning2.label"
                                            :value="want_family_planning2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.want_family_planning2']">
                                          {{errors['form.want_family_planning2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table"  v-if="form.want_have_children3 !== '١'">
                                          <el-select   v-model="form.want_family_planning3" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="want_family_planning3 in yesOrno"
                                            :key="want_family_planning3.value"
                                            :label="want_family_planning3.label"
                                            :value="want_family_planning3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.want_family_planning3']">
                                          {{errors['form.want_family_planning3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.want_family_planning_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.want_family_planning_Notes']">
                                                    {{errors['form.want_family_planning_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>



                                 <tr> <!-- start mrs. 11 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣١١	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.intend_method_future') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                       <el-select   v-model="form.intend_method_future1" placeholder="السبب" >
                                          <el-option
                                            v-for="intend_method_future1 in intend_method_futures"
                                            :key="intend_method_future1.value"
                                            :label="intend_method_future1.label"
                                            :value="intend_method_future1.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.intend_method_future1']">
                                          {{errors['form.intend_method_future1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                          <el-select   v-model="form.intend_method_future2" placeholder="السبب" >
                                          <el-option
                                            v-for="intend_method_future2 in intend_method_futures"
                                            :key="intend_method_future2.value"
                                            :label="intend_method_future2.label"
                                            :value="intend_method_future2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.intend_method_future2']">
                                          {{errors['form.intend_method_future2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                          <el-select   v-model="form.intend_method_future3" placeholder="السبب" >
                                          <el-option
                                            v-for="intend_method_future3 in intend_method_futures"
                                            :key="intend_method_future3.value"
                                            :label="intend_method_future3.label"
                                            :value="intend_method_future3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.intend_method_future3']">
                                          {{errors['form.intend_method_future3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.intend_method_future_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.intend_method_future_Notes']">
                                                    {{errors['form.intend_method_future_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>




                               <tr> <!-- start mrs. 12 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣١٢	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.gave_birth_child_died') }}  </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                       <el-select   v-model="form.gave_birth_child_died1" placeholder="السبب" >
                                          <el-option
                                            v-for="gave_birth_child_died1 in yesOrno"
                                            :key="gave_birth_child_died1.value"
                                            :label="gave_birth_child_died1.label"
                                            :value="gave_birth_child_died1.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.gave_birth_child_died1']">
                                          {{errors['form.gave_birth_child_died1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                          <el-select   v-model="form.gave_birth_child_died2" placeholder="السبب" >
                                          <el-option
                                            v-for="gave_birth_child_died2 in yesOrno"
                                            :key="gave_birth_child_died2.value"
                                            :label="gave_birth_child_died2.label"
                                            :value="gave_birth_child_died2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.gave_birth_child_died2']">
                                          {{errors['form.gave_birth_child_died2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                          <el-select   v-model="form.gave_birth_child_died3" placeholder="السبب" >
                                          <el-option
                                            v-for="gave_birth_child_died3 in yesOrno"
                                            :key="gave_birth_child_died3.value"
                                            :label="gave_birth_child_died3.label"
                                            :value="gave_birth_child_died3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.gave_birth_child_died3']">
                                          {{errors['form.gave_birth_child_died3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.gave_birth_child_died_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.gave_birth_child_died_Notes']">
                                                    {{errors['form.gave_birth_child_died_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>



                               <tr> <!-- start mrs. 13 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣١٣	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.gave_birth_child_died') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                      {{ $trans('app.live') }}  <el-input size="small" type="number" placeholder="" v-model="form.gave_birth_child_live1" > </el-input>
                                         {{ $trans('app.dead') }}  <el-input size="small" type="number" placeholder="" v-model="form.gave_birth_child_died_num1"  ></el-input>

                                        <span class="text-danger" v-if="errors['form.gave_birth_child_live1']">
                                          {{errors['form.gave_birth_child_live1'][0]}}
                                      </span> <br>
                                             <span class="text-danger" v-if="errors['form.gave_birth_child_died_num1']">
                                          {{errors['form.gave_birth_child_died_num1'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                         {{ $trans('app.live') }}  <el-input size="small" type="number" placeholder="" v-model="form.gave_birth_child_live2" > </el-input>
                                         {{ $trans('app.dead') }}  <el-input size="small" type="number" placeholder="" v-model="form.gave_birth_child_died_num2"  ></el-input>

                                        <span class="text-danger" v-if="errors['form.gave_birth_child_live2']">
                                          {{errors['form.gave_birth_child_live2'][0]}}
                                      </span> <br>
                                             <span class="text-danger" v-if="errors['form.gave_birth_child_died_num2']">
                                          {{errors['form.gave_birth_child_died_num2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                            <div class="width-table">
                                         {{ $trans('app.live') }}  <el-input size="small" type="number" placeholder="" v-model="form.gave_birth_child_live3" > </el-input>
                                         {{ $trans('app.dead') }}  <el-input size="small" type="number" placeholder="" v-model="form.gave_birth_child_died_num3"  ></el-input>

                                        <span class="text-danger" v-if="errors['form.gave_birth_child_live3']">
                                          {{errors['form.gave_birth_child_live3'][0]}}
                                      </span> <br>
                                             <span class="text-danger" v-if="errors['form.gave_birth_child_died_num3']">
                                          {{errors['form.gave_birth_child_died_num3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.gave_birth_child_live_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.gave_birth_child_live_Notes']">
                                                    {{errors['form.gave_birth_child_live_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>


                                <tr> <!-- start mrs. 14 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣١٤	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.children_past_five_years') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                      {{ $trans('app.live') }}  <el-input size="small" type="number" placeholder="" v-model="form.children_past_five_years_live1" > </el-input>
                                         {{ $trans('app.dead') }}  <el-input size="small" type="number" placeholder="" v-model="form.children_past_five_years_dead1"  ></el-input>

                                        <span class="text-danger" v-if="errors['form.children_past_five_years_live1']">
                                          {{errors['form.children_past_five_years_live1'][0]}}
                                      </span> <br>
                                             <span class="text-danger" v-if="errors['form.children_past_five_years_dead2']">
                                          {{errors['form.children_past_five_years_dead2'][0]}}
                                      </span>

                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                         {{ $trans('app.live') }}  <el-input size="small" type="number" placeholder="" v-model="form.children_past_five_years_live2" > </el-input>
                                         {{ $trans('app.dead') }}  <el-input size="small" type="number" placeholder="" v-model="form.children_past_five_years_dead2"  ></el-input>

                                        <span class="text-danger" v-if="errors['form.children_past_five_years_live2']">
                                          {{errors['form.children_past_five_years_live2'][0]}}
                                      </span> <br>
                                             <span class="text-danger" v-if="errors['form.gave_birth_child_died2']">
                                          {{errors['form.gave_birth_child_died2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                            <div class="width-table">
                                         {{ $trans('app.live') }}  <el-input size="small" type="number" placeholder="" v-model="form.children_past_five_years_live3" > </el-input>
                                         {{ $trans('app.dead') }}  <el-input size="small" type="number" placeholder="" v-model="form.children_past_five_years_dead3"  ></el-input>

                                        <span class="text-danger" v-if="errors['form.children_past_five_years_live3']">
                                          {{errors['form.children_past_five_years_live3'][0]}}
                                      </span> <br>
                                             <span class="text-danger" v-if="errors['form.children_past_five_years_dead3']">
                                          {{errors['form.children_past_five_years_dead3'][0]}}
                                      </span>

                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.children_past_five_years_live_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.children_past_five_years_live_Notes']">
                                                    {{errors['form.children_past_five_years_live_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>



                                   <tr> <!-- start mrs. 14 -->
                                  <td scope="row">
                                      <span class="demonstration block"> ٣١٥	</span>
                                  </td>
                                  <td>
                                   <p class="text-size"> {{ $trans('app.purification') }} </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                    <el-select   v-model="form.purification1" placeholder="السبب" >
                                          <el-option
                                            v-for="purification1 in purification"
                                            :key="purification1.value"
                                            :label="purification1.label"
                                            :value="purification1.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.purification1']">
                                          {{errors['form.purification1'][0]}}
                                      </span>
                                    </div>
                                  </td>
                                   <td>
                                      <div class="width-table">
                                      <el-select   v-model="form.purification2" placeholder="السبب" >
                                          <el-option
                                            v-for="purification2 in purification"
                                            :key="purification2.value"
                                            :label="purification2.label"
                                            :value="purification2.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.purification2']">
                                          {{errors['form.purification2'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                    <td>
                                      <div class="width-table">
                                         <el-select   v-model="form.purification3" placeholder="السبب" >
                                          <el-option
                                            v-for="purification3 in purification"
                                            :key="purification3.value"
                                            :label="purification3.label"
                                            :value="purification3.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.purification3']">
                                          {{errors['form.purification3'][0]}}
                                      </span>
                                      </div>
                                  </td>

                                     <td>
                                      <div class="width-table">
                                          <div class="width-table">
                                              <el-input type="textarea" v-model="form.purification_Notes" size="small" placeholder="اكتب ملاحظتك"   ></el-input>
                                                <span class="text-danger" v-if="errors['form.purification_Notes']">
                                                    {{errors['form.purification_Notes'][0]}}
                                                </span>
                                            </div>
                                      </div>
                                  </td>
                              </tr>
                          </tbody>
                        </table><!--  End table Reproductive_Health -->



                        </el-tab-pane>


                        <el-tab-pane>  <!--  start for family projects -->
                            <span slot="label"><i class="fas fa-coins"></i>  {{ $trans('app.family_projects') }}  </span>

                      <table class="table table-bordered table-responsive  border-primary mt-4" > <!--  start table Reproductive_Health -->
                          <thead>
                            <tr>
                              <th scope="col">{{ $trans('app.num') }} </th>
                              <th scope="col">{{ $trans('app.pointer') }}</th>
                              <th scope="col">{{ $trans('app.Evaluation') }}</th>
                              <th scope="col">{{ $trans('app.Notes') }}</th>


                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td scope="row">
                                      <span class="demonstration block"> ٤٠١	</span>
                                  </td>
                                  <td>
                                  <p class="text-size text-width">  {{ $trans('app.more_family_members_own_participate') }}  </p>
                                  </td>
                                  <td>
                                    <div class="width-table-z">
                                          <el-select   v-model="form.more_family_members_own_participate" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="more_family_members_own_participate in yesOrno"
                                            :key="more_family_members_own_participate.value"
                                            :label="more_family_members_own_participate.label"
                                            :value="more_family_members_own_participate.value">
                                          </el-option>
                                        </el-select>
                                         <span class="text-danger" v-if="errors['form.more_family_members_own_participate']">
                                          {{errors['form.more_family_members_own_participate'][0]}}
                                      </span>
                                    <el-input size="small" type="number" placeholder="العدد" v-if="form.more_family_members_own_participate == '١'" v-model="form.more_family_members_own_participate_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.more_family_members_own_participate_number']">
                                          {{errors['form.more_family_members_own_participate_number'][0]}}
                                      </span>
                                    </div>
                                  </td>
                                     <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.more_family_members_own_participate_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.more_family_members_own_participate_Notes']">
                                            {{errors['form.more_family_members_own_participate_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>


                                 <tr  v-if="form.more_family_members_own_participate !== '٢'">
                                  <td scope="row">
                                      <span class="demonstration block"> ٤٠٢	</span>
                                  </td>
                                  <td>
                                  <p class="text-size">  {{ $trans('app.What_project_activity') }}  </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                          <el-select   v-model="form.What_project_activity" placeholder="اختر نشاط المشروع" >
                                          <el-option
                                            v-for="What_project_activity in What_project_activitys"
                                            :key="What_project_activity.value"
                                            :label="What_project_activity.label"
                                            :value="What_project_activity.value">
                                          </el-option>
                                        </el-select>

                                      <span class="text-danger" v-if="errors['form.What_project_activity']">
                                          {{errors['form.What_project_activity'][0]}}
                                      </span>
                                    </div>
                                  </td>

                                     <td >
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.What_project_activity_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.What_project_activity_Notes']">
                                            {{errors['form.What_project_activity_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>


                               <tr v-if="form.more_family_members_own_participate !== '٢'">
                                  <td scope="row">
                                      <span class="demonstration block"> ٤٠٣	</span>
                                  </td>
                                  <td>
                                  <p class="text-size">  {{ $trans('app.type_of_project') }}  </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                  <el-input type="textarea" placeholder="" v-model="form.type_of_project"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.type_of_project']">
                                          {{errors['form.type_of_project'][0]}}
                                      </span>
                                    </div>
                                  </td>


                                     <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.type_of_project_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.type_of_project_Notes']">
                                            {{errors['form.type_of_project_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>




                                <tr v-if="form.more_family_members_own_participate !== '٢'">
                                  <td scope="row">
                                      <span class="demonstration block"> ٤٠٤	</span>
                                  </td>
                                  <td>
                                  <p class="text-size">  {{ $trans('app.monthly_income_generated') }}  </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                       <p class="text-size"> {{ $trans('app.Income_value_pounds') }} </p>
                                  <el-input type="number" placeholder="القيمة" v-model="form.monthly_income_generated"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.monthly_income_generated']">
                                          {{errors['form.monthly_income_generated'][0]}}
                                      </span>
                                    </div>
                                  </td>


                                     <td>
                                      <div class="width-table">
                                         <p class="text-size">   </p>
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.monthly_income_generated_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.monthly_income_generated_Notes']">
                                            {{errors['form.monthly_income_generated_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>



                               <tr>
                                  <td scope="row">
                                      <span class="demonstration block"> ٤٠٥	</span>
                                  </td>
                                  <td>
                                  <p class="text-size">  {{ $trans('app.would_like_assignment') }}  </p>

                                  </td>
                                  <td>
                                    <div class="width-table">
                                       <el-select   v-model="form.would_like_assignment" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="would_like_assignment in yesOrno"
                                            :key="would_like_assignment.value"
                                            :label="would_like_assignment.label"
                                            :value="would_like_assignment.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.would_like_assignment']">
                                          {{errors['form.would_like_assignment'][0]}}
                                      </span>
                                    </div>
                                  </td>


                                     <td>
                                      <div class="width-table">
                                         <p class="text-size">   </p>
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.would_like_assignment_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.would_like_assignment_Notes']">
                                            {{errors['form.would_like_assignment_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>



                              <tr>
                                  <td scope="row">
                                      <span class="demonstration block"> ٤٠٦	</span>
                                  </td>
                                  <td>
                                      <p class="text-size">  {{ $trans('app.Why_will_take_loan') }}  </p>
                                  </td>
                                  <td>
                                    <div class="width-table">
                                       <el-select   v-model="form.Why_will_take_loan" placeholder="السبب" >
                                          <el-option
                                            v-for="Why_will_take_loan in Why_will_take_loans"
                                            :key="Why_will_take_loan.value"
                                            :label="Why_will_take_loan.label"
                                            :value="Why_will_take_loan.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Why_will_take_loan']">
                                          {{errors['form.Why_will_take_loan'][0]}}
                                      </span>
                                    </div>
                                  </td>


                                     <td>
                                      <div class="width-table">

                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.Why_will_take_loan_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.Why_will_take_loan_Notes']">
                                            {{errors['form.Why_will_take_loan_Notes'][0]}}
                                        </span>
                                      </div>
                                  </td>
                              </tr>
                          </tbody>
                          </table>

                          <hr>

                       <p class="text-center"> {{ $trans('app.Sources_income') }} </p>
                      <table class="table table-bordered table-responsive  border-primary mt-4" > <!--  start table Reproductive_Health -->

                          <tbody>
                              <tr>
                                <td scope="row">
                                    <span class="demonstration block"> ٥٠١	</span> <br>

                              <b class="text-size text-width">  {{ $trans('app.What_sources_family') }}  </b>  <br>
                              <b class="text-size text-width">  {{ $trans('app.When_answering_yes') }}  </b>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <p class="text-size text-width">  {{ $trans('app.fixed_or_unfixed') }}  </p>

                                  <td>
                                    <div class="width-table-z ">
                                          <el-select   v-model="form.fixed_or_unfixed" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="fixed_or_unfixed in yesOrno"
                                            :key="fixed_or_unfixed.value"
                                            :label="fixed_or_unfixed.label"
                                            :value="fixed_or_unfixed.value">
                                          </el-option>
                                        </el-select>
                                        <span class="text-danger" v-if="errors['form.fixed_or_unfixed']">
                                          {{errors['form.fixed_or_unfixed'][0]}}
                                      </span>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.fixed_or_unfixed == '١'" v-model="form.fixed_or_unfixed_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.fixed_or_unfixed_number']">
                                          {{errors['form.fixed_or_unfixed_number'][0]}}٦٠١
                                      </span>
                                    </div>
                                  </td>
                                <td>
                                  <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.Reproductive_Health_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.Reproductive_Health_Notes']">
                                            {{errors['form.Reproductive_Health_Notes'][0]}}
                                        </span>
                                  </div>
                              </td>
                              </tr>
                              <tr>
                                <td>
                                  <p class="text-size text-width mt-4">  {{ $trans('app.Income_agricultural_work') }}  </p>
                                </td>
                                <td>
                                    <div class="width-table-z ">
                                          <el-select   v-model="form.Income_agricultural_work" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Income_agricultural_work in yesOrno"
                                            :key="Income_agricultural_work.value"
                                            :label="Income_agricultural_work.label"
                                            :value="Income_agricultural_work.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.Income_agricultural_work == '١'" v-model="form.Income_agricultural_work_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Income_agricultural_work_number']">
                                          {{errors['form.Income_agricultural_work_number'][0]}}
                                      </span>
                                    </div>
                                  </td>
                              </tr>

                               <tr>
                                <td>
                                <p class="text-size text-width mt-4">  {{ $trans('app.Income_animal_business') }}  </p>
                                  <p class="text-size text-width mt-4">  {{ $trans('app.Income_family_business') }}  </p>
                                </td>
                                <td>

                                 <div class="width-table-z mt-4">
                                          <el-select   v-model="form.Income_animal_business" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Income_animal_business in yesOrno"
                                            :key="Income_animal_business.value"
                                            :label="Income_animal_business.label"
                                            :value="Income_animal_business.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.Income_animal_business == '١'" v-model="form.Income_animal_business_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Income_animal_business']">
                                          {{errors['form.Income_animal_business'][0]}}
                                      </span>
                                    </div>

                                    <div class="width-table-z mt-2">
                                          <el-select   v-model="form.Income_family_business" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Income_family_business in yesOrno"
                                            :key="Income_family_business.value"
                                            :label="Income_family_business.label"
                                            :value="Income_family_business.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.Income_family_business == '١'" v-model="form.Income_family_business_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Income_family_business']">
                                          {{errors['form.Income_family_business'][0]}}
                                      </span>
                                    </div>
                                  </td>
                              </tr>


                            <tr>
                                <td>
                                  <p class="text-size text-width mt-4">  {{ $trans('app.Government_pension') }}  </p>
                                </td>
                                <td>
                                    <div class="width-table-z ">
                                          <el-select   v-model="form.Government_pension" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Government_pension in yesOrno"
                                            :key="Government_pension.value"
                                            :label="Government_pension.label"
                                            :value="Government_pension.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.Government_pension == '١'" v-model="form.Government_pension_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Government_pension_number']">
                                          {{errors['form.Government_pension_number'][0]}}
                                      </span>
                                    </div>
                                  </td>
                              </tr>


                              <tr>
                                <td>
                                  <p class="text-size text-width mt-4">  {{ $trans('app.Aid_from_NGOs') }}  </p>
                                </td>
                                <td>
                                    <div class="width-table-z ">
                                          <el-select   v-model="form.Aid_from_NGOs" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Aid_from_NGOs in yesOrno"
                                            :key="Aid_from_NGOs.value"
                                            :label="Aid_from_NGOs.label"
                                            :value="Aid_from_NGOs.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.Aid_from_NGOs == '١'" v-model="form.Aid_from_NGOs_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Aid_from_NGOs_number']">
                                          {{errors['form.Aid_from_NGOs_number'][0]}}
                                      </span>
                                    </div>
                                  </td>
                              </tr>

                               <tr>
                                <td>
                                  <p class="text-size text-width mt-4">  {{ $trans('app.Help_good_people') }}  </p>
                                </td>
                                <td>
                                    <div class="width-table-z ">
                                          <el-select   v-model="form.Help_good_people" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Help_good_people in yesOrno"
                                            :key="Help_good_people.value"
                                            :label="Help_good_people.label"
                                            :value="Help_good_people.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.Help_good_people == '١'" v-model="form.Help_good_people_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Help_good_people_number']">
                                          {{errors['form.Help_good_people_number'][0]}}
                                      </span>
                                    </div>
                                  </td>
                              </tr>


                               <tr>
                                <td>
                                  <p class="text-size text-width mt-4">  {{ $trans('app.other') }}  </p>
                                </td>
                                <td>
                                    <div class="width-table-z">
                                          <el-select   v-model="form.other" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="other in yesOrno"
                                            :key="other.value"
                                            :label="other.label"
                                            :value="other.value">
                                          </el-option>
                                        </el-select>
                                    <el-input size="small" type="number" placeholder="قيمة الدخل" v-if="form.other == '١'" v-model="form.other_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.other_number']">
                                          {{errors['form.other_number'][0]}}
                                      </span>
                                    </div>
                                  </td>
                              </tr>
                          </tbody>
                          </table>


                          </el-tab-pane>



                    <el-tab-pane>  <!--  start for family Lending_background -->
                    <span slot="label"><i class="fab fa-audible"></i> {{ $trans('app.Lending_background') }}  </span>
                      <p class="mb-2 d-flex justify-content-center" >{{ $trans('app.Lending_background') }}</p>
                      <hr>
                      <table class="table table-bordered table-responsive  border-primary mt-4" >
                        <!--  start table Lending_background -->
                          <thead>
                            <tr>
                              <th scope="col">{{ $trans('app.num') }} </th>
                              <th scope="col">{{ $trans('app.pointer') }}</th>
                              <th scope="col">{{ $trans('app.Evaluation') }}</th>
                              <th scope="col">{{ $trans('app.Notes') }}</th>


                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td>
                                      <span class="demonstration block"> ٦٠١	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.Have_ever_loan') }}  </p>
                                </td>
                                <td>
                                    <el-select   v-model="form.Have_ever_loan" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Have_ever_loan in yesOrno"
                                            :key="Have_ever_loan.value"
                                            :label="Have_ever_loan.label"
                                            :value="Have_ever_loan.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Have_ever_loan']">
                                          {{errors['form.Have_ever_loan'][0]}}
                                      </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.Have_ever_loan_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.Have_ever_loan_Notes']">
                                            {{errors['form.Have_ever_loan_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                                <tr  v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٢	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.value_last_loan') }}  </p>
                                </td>
                                <td>
                                     <el-input type="number" size="small" placeholder="القيمة بالجنية" v-model="form.value_last_loan" ></el-input>
                                      <span class="text-danger" v-if="errors['form.value_last_loan']">
                                          {{errors['form.value_last_loan'][0]}}
                                      </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.value_last_loan_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.value_last_loan_Notes']">
                                            {{errors['form.value_last_loan_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>


                              <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٣	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.What_with_another_loan') }}  </p>
                                </td>
                                <td>
                                     <el-select   v-model="form.What_with_another_loan" placeholder="أختر" >
                                          <el-option
                                            v-for="What_with_another_loan in What_with_another_loans"
                                            :key="What_with_another_loan.value"
                                            :label="What_with_another_loan.label"
                                            :value="What_with_another_loan.value">
                                          </el-option>
                                        </el-select>



                                      <span class="text-danger" v-if="errors['form.What_with_another_loan']">
                                          {{errors['form.What_with_another_loan'][0]}}
                                      </span>

                              <el-input  size="small" v-if="form.What_with_another_loan == 'X'" placeholder="السبب الأخر" v-model="form.What_with_another_loan_Anther"  ></el-input>
                                <span class="text-danger" v-if="errors['form.What_with_another_loan_Anther']">
                                    {{errors['form.What_with_another_loan_Anther'][0]}}
                                </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.What_with_another_loans_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.What_with_another_loans_Notes']">
                                            {{errors['form.What_with_another_loans_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>


                              <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٤	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.tell_nature_loan') }}  </p>
                                </td>
                                <td>
                                     <el-select   v-model="form.tell_nature_loan" placeholder="أختر" >
                                          <el-option
                                            v-for="tell_nature_loan in tell_nature_loans"
                                            :key="tell_nature_loan.value"
                                            :label="tell_nature_loan.label"
                                            :value="tell_nature_loan.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.tell_nature_loan']">
                                          {{errors['form.tell_nature_loan'][0]}}
                                      </span>

                              <el-input  size="small" v-if="form.tell_nature_loan == '٩'" placeholder="السبب الأخر" v-model="form.tell_nature_loan_Anther"  ></el-input>
                                <span class="text-danger" v-if="errors['form.tell_nature_loan_Anther']">
                                    {{errors['form.tell_nature_loan_Anther'][0]}}
                                </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.tell_nature_loan_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.tell_nature_loan_Notes']">
                                            {{errors['form.tell_nature_loan_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                              <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٥	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.papers_required_loan') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.papers_required_loan" placeholder="أختر" multiple >
                                          <el-option
                                            v-for="papers_required_loan in papers_required_loans"
                                            :key="papers_required_loan.value"
                                            :label="papers_required_loan.label"
                                            :value="papers_required_loan.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.papers_required_loans']">
                                          {{errors['form.papers_required_loans'][0]}}
                                      </span>

                              <el-input  size="small" v-if="form.papers_required_loan == '٩'"  placeholder="السبب الأخر" v-model="form.papers_required_loans_Anther"  ></el-input>
                                <span class="text-danger" v-if="errors['form.papers_required_loans_Anther']">
                                    {{errors['form.papers_required_loans_Anther'][0]}}
                                </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.papers_required_loans_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.papers_required_loans_Notes']">
                                            {{errors['form.papers_required_loanstell_nature_loan_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                               <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٦	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.how_long_takes_respond') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.how_long_takes_respond" placeholder="أختر" >
                                          <el-option
                                            v-for="how_long_takes_respond in how_long_takes_responds"
                                            :key="how_long_takes_respond.value"
                                            :label="how_long_takes_respond.label"
                                            :value="how_long_takes_respond.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.how_long_takes_respond']">
                                          {{errors['form.how_long_takes_respond'][0]}}
                                      </span>

                              <el-input  size="small" v-if="form.how_long_takes_respond == '٩'"  placeholder="السبب الأخر" v-model="form.how_long_takes_respond_Anther"  ></el-input>
                                <span class="text-danger" v-if="errors['form.how_long_takes_respond_Anther']">
                                    {{errors['form.how_long_takes_respond_Anther'][0]}}
                                </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.how_long_takes_respond_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.how_long_takes_respond_Notes']">
                                            {{errors['form.how_long_takes_respond_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>


                               <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٧	</span>
                                </td>
                                <td>
                                  <p class="text-size-s"> {{ $trans('app.tell_contract_clear') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.tell_contract_clear" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="tell_contract_clear in yesOrno"
                                            :key="tell_contract_clear.value"
                                            :label="tell_contract_clear.label"
                                            :value="tell_contract_clear.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.tell_contract_clear']">
                                          {{errors['form.tell_contract_clear'][0]}}
                                      </span>


                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.tell_contract_clear_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.tell_contract_clear_Notes']">
                                            {{errors['form.tell_contract_clear_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>


                              <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٨	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.copy_contract') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.copy_contract" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="copy_contract in yesOrno"
                                            :key="copy_contract.value"
                                            :label="copy_contract.label"
                                            :value="copy_contract.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.copy_contract']">
                                          {{errors['form.copy_contract'][0]}}
                                      </span>


                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.copy_contract_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.copy_contract_Notes']">
                                            {{errors['form.copy_contract_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                              <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦٠٩	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.financial_institution_borrowed') }}  </p>
                                </td>
                                <td>
                                <div class="text-size-s mt-2">
                                  {{ $trans('app.interest_rate') }}<br>
                                     <el-select  v-model="form.interest_rate" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="interest_rate in yesOrno"
                                            :key="interest_rate.value"
                                            :label="interest_rate.label"
                                            :value="interest_rate.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.interest_rate']">
                                          {{errors['form.interest_rate'][0]}}
                                      </span>
                                </div>
                                <div class="text-size-s mt-2">
                                    {{ $trans('app.Fee') }} <br>

                                         <el-select  v-model="form.Fee" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Fee in yesOrno"
                                            :key="Fee.value"
                                            :label="Fee.label"
                                            :value="Fee.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Fee']">
                                          {{errors['form.Fee'][0]}}
                                      </span>
                                </div>
                                <div  class="text-size-s mt-2">
                                 {{ $trans('app.Payment_Terms') }}  <br>

                                         <el-select  v-model="form.Payment_Terms" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Payment_Terms in yesOrno"
                                            :key="Payment_Terms.value"
                                            :label="Payment_Terms.label"
                                            :value="Payment_Terms.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Payment_Terms']">
                                          {{errors['form.Payment_Terms'][0]}}
                                      </span>
                                </div>
                                <div class="text-size-s mt-2">
                                 {{ $trans('app.Consequences_late_payment') }} <br>

                                         <el-select  v-model="form.Consequences_late_payment" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Consequences_late_payment in yesOrno"
                                            :key="Consequences_late_payment.value"
                                            :label="Consequences_late_payment.label"
                                            :value="Consequences_late_payment.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Consequences_late_payment']">
                                          {{errors['form.Consequences_late_payment'][0]}}
                                      </span>
                                  </div>

                                  <div class="text-size-s mt-2">
                                   {{ $trans('app.Failures_their_consequences') }}  <br>

                                         <el-select  v-model="form.Failures_their_consequences" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Failures_their_consequences in yesOrno"
                                            :key="Failures_their_consequences.value"
                                            :label="Failures_their_consequences.label"
                                            :value="Failures_their_consequences.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Failures_their_consequences']">
                                          {{errors['form.Failures_their_consequences'][0]}}
                                      </span>
                                    </div>
                                    <div  class="text-size-s mt-2">
                                     {{ $trans('app.amending_changing') }}  <br>
                                         <el-select  v-model="form.amending_changing" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="amending_changing in yesOrno"
                                            :key="amending_changing.value"
                                            :label="amending_changing.label"
                                            :value="amending_changing.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.amending_changing']">
                                          {{errors['form.amending_changing'][0]}}
                                      </span>
                                    </div>
                                    <div  class="text-size-s mt-2">
                                        {{ $trans('app.Options_resorted_event') }} <br>
                                         <el-select  v-model="form.Options_resorted_event" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Options_resorted_event in yesOrno"
                                            :key="Options_resorted_event.value"
                                            :label="Options_resorted_event.label"
                                            :value="Options_resorted_event.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Options_resorted_event']">
                                          {{errors['form.Options_resorted_event'][0]}}
                                      </span>
                                        </div>
                                        <div  class="text-size-s mt-2">
                                        {{ $trans('app.data_information_borrowers') }}  <br>
                                         <el-select  v-model="form.data_information_borrowers" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="data_information_borrowers in yesOrno"
                                            :key="data_information_borrowers.value"
                                            :label="data_information_borrowers.label"
                                            :value="data_information_borrowers.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.data_information_borrowers']">
                                          {{errors['form.data_information_borrowers'][0]}}
                                      </span>
                                    </div>

                                     <div  class="text-size-s mt-2">
                                        {{ $trans('app.information_rights_borrower') }}  <br>
                                         <el-select  v-model="form.information_rights_borrower" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="information_rights_borrower in yesOrno"
                                            :key="information_rights_borrower.value"
                                            :label="information_rights_borrower.label"
                                            :value="information_rights_borrower.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.information_rights_borrower']">
                                          {{errors['form.information_rights_borrower'][0]}}
                                      </span>
                                    </div>

                                      <div  class="text-size-s mt-2">
                                       {{ $trans('app.last_remember') }} <br>
                                         <el-select  v-model="form.last_remember" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="last_remember in yesOrno"
                                            :key="last_remember.value"
                                            :label="last_remember.label"
                                            :value="last_remember.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.last_remember']">
                                          {{errors['form.last_remember'][0]}}
                                      </span>


                                    <el-input  size="small" v-if="form.last_remember == '١'"  placeholder="السبب الأخر" v-model="form.last_remember_another"  ></el-input>
                                    <span class="text-danger" v-if="errors['form.last_remember_another']">
                                        {{errors['form.last_remember_another'][0]}}
                                    </span>
                                    </div>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.last_remember_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.last_remember_Notes']">
                                            {{errors['form.last_remember_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                                <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦١٠	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.training_courses_attended') }}  </p>
                                </td>
                                <td>
                                <el-input  size="small" placeholder="الاجتماع/الدوره" v-model="form.training_courses_attended" ></el-input>
                                      <span class="text-danger" v-if="errors['form.training_courses_attended']">
                                          {{errors['form.training_courses_attended'][0]}}
                                      </span>

                                    <el-input  size="small" placeholder="الاجتماع/الدوره" v-model="form.training_courses_attended1" ></el-input>
                                      <span class="text-danger" v-if="errors['form.training_courses_attended1']">
                                          {{errors['form.training_courses_attended1'][0]}}
                                      </span>


                                      <el-input  size="small" placeholder="الاجتماع/الدوره" v-model="form.training_courses_attended2" ></el-input>
                                      <span class="text-danger" v-if="errors['form.training_courses_attended2']">
                                          {{errors['form.training_courses_attended2'][0]}}
                                      </span>

                                      <el-input  size="small" placeholder="الاجتماع/الدوره" v-model="form.training_courses_attended3" ></el-input>
                                      <span class="text-danger" v-if="errors['form.training_courses_attended3']">
                                          {{errors['form.training_courses_attended3'][0]}}
                                      </span>
                                      <p class="text-size">   {{ $trans('app.will_considered_that_you') }}</p>


                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.training_courses_attended_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.training_courses_attended_Notes']">
                                            {{errors['form.training_courses_attended_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                              <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦١١	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.what_guarantees_provided') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.what_guarantees_provided" placeholder="اختر الضمان" >
                                          <el-option
                                            v-for="what_guarantees_provided in what_guarantees_provideds"
                                            :key="what_guarantees_provided.value"
                                            :label="what_guarantees_provided.label"
                                            :value="what_guarantees_provided.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.what_guarantees_provided']">
                                          {{errors['form.what_guarantees_provided'][0]}}
                                      </span>

                             <el-input size="small"  placeholder="ضمان أخر" v-if="form.what_guarantees_provided == '٩'" v-model="form.Help_good_people_Anther"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.Help_good_people_Anther']">
                                          {{errors['form.Help_good_people_Anther'][0]}}
                                      </span>
                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.what_guarantees_provided_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.what_guarantees_provided_Notes']">
                                            {{errors['form.what_guarantees_provided_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>




                               <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦١٢	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.papers_collateral_loan') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.papers_collateral_loan" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="papers_collateral_loan in yesOrno"
                                            :key="papers_collateral_loan.value"
                                            :label="papers_collateral_loan.label"
                                            :value="papers_collateral_loan.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.papers_collateral_loan']">
                                          {{errors['form.papers_collateral_loan'][0]}}
                                      </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.papers_collateral_loan_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.papers_collateral_loan_Notes']">
                                            {{errors['form.papers_collateral_loan_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>




                               <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦١٣	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.What_papers_worth') }}  </p>
                                </td>
                                <td>
                                  <div  class="text-size-s mt-2">
                                      {{ $trans('app.trust_receipt') }} :
                                        <el-select  v-model="form.trust_receipt" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="trust_receipt in yesOrno"
                                                :key="trust_receipt.value"
                                                :label="trust_receipt.label"
                                                :value="trust_receipt.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.trust_receipt']">
                                              {{errors['form.trust_receipt'][0]}}
                                          </span>
                                     </div>

                                    <div  class="text-size-s mt-2">
                                       {{ $trans('app.Check') }} :
                                     <el-select  v-model="form.Check" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="Check in yesOrno"
                                            :key="Check.value"
                                            :label="Check.label"
                                            :value="Check.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.Check']">
                                          {{errors['form.Check'][0]}}
                                      </span>
                                    </div>

                                   <div  class="text-size-s mt-2">
                                    {{ $trans('app.other_remember') }} :
                                     <el-select  v-model="form.other_remember" placeholder="نعم/لا" >
                                          <el-option
                                            v-for="other_remember in yesOrno"
                                            :key="other_remember.value"
                                            :label="other_remember.label"
                                            :value="other_remember.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.other_remember']">
                                          {{errors['form.other_remember'][0]}}
                                      </span>
                                   </div>

                                   <div  class="text-size-s mt-2" v-if="form.other_remember == '١'">
                                  <el-input size="small" placeholder="السبب الأخر" v-model="form.other_remember_anther"  ></el-input>
                                    <span class="text-danger" v-if="errors['form.other_remember_anther']">
                                        {{errors['form.other_remember_anther'][0]}}
                                    </span>
                                   </div>
                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.other_remember_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.other_remember_Notes']">
                                            {{errors['form.other_remember_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                               <tr v-if="form.Have_ever_loan == '١'">
                                <td>
                                      <span class="demonstration block"> ٦١٤	</span>
                                </td>
                                <td>
                                  <p class="text-size"> {{ $trans('app.receipts_spent_value_loan_increase') }}  </p>
                                </td>
                                <td>
                                     <el-select  v-model="form.receipts_spent_value_loan_increase" placeholder="اختر" >
                                          <el-option
                                            v-for="receipts_spent_value_loan_increase in receipts_spent_value_loan_increases"
                                            :key="receipts_spent_value_loan_increase.value"
                                            :label="receipts_spent_value_loan_increase.label"
                                            :value="receipts_spent_value_loan_increase.value">
                                          </el-option>
                                        </el-select>
                                      <span class="text-danger" v-if="errors['form.receipts_spent_value_loan_increase']">
                                          {{errors['form.receipts_spent_value_loan_increase'][0]}}
                                      </span>

                                </td>
                                <td>
                                      <div class="width-table">
                                      <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.receipts_spent_value_loan_increase_Notes"  ></el-input>
                                        <span class="text-danger" v-if="errors['form.receipts_spent_value_loan_increase_Notes']">
                                            {{errors['form.receipts_spent_value_loan_increase_Notes'][0]}}
                                        </span>
                                      </div>
                                </td>
                              </tr>



                                 <tr v-if="form.Have_ever_loan == '١'">
                                    <td>
                                          <span class="demonstration block"> ٦١٥	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.have_late_paying') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.have_late_paying" placeholder="اختر" >
                                              <el-option
                                                v-for="have_late_paying in yesOrno"
                                                :key="have_late_paying.value"
                                                :label="have_late_paying.label"
                                                :value="have_late_paying.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.have_late_paying']">
                                              {{errors['form.have_late_paying'][0]}}
                                          </span>

                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.have_late_paying_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.have_late_paying_Notes']">
                                                {{errors['form.have_late_paying_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                                 <tr v-if="form.Have_ever_loan == '١'">
                                    <td>
                                          <span class="demonstration block"> ٦١٦	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.say_result_delay') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.say_result_delay" placeholder="اختر" >
                                              <el-option
                                                v-for="say_result_delay in say_result_delays"
                                                :key="say_result_delay.value"
                                                :label="say_result_delay.label"
                                                :value="say_result_delay.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.say_result_delay']">
                                              {{errors['form.say_result_delay'][0]}}
                                          </span>
                                  <el-input size="small"  placeholder="نتيجة أخري" v-if="form.say_result_delay == '٩'" v-model="form.say_result_delay_Anther"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.say_result_delay_Anther']">
                                          {{errors['form.say_result_delay_Anther'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.say_result_delay_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.say_result_delay_Notes']">
                                                {{errors['form.say_result_delay_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                                 <tr v-if="form.Have_ever_loan == '١'">
                                    <td>
                                          <span class="demonstration block"> ٦١٧	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.does_financial_institution_agency') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.does_financial_institution_agency" placeholder="اختر" >
                                              <el-option
                                                v-for="does_financial_institution_agency in does_financial_institution_agencys"
                                                :key="does_financial_institution_agency.value"
                                                :label="does_financial_institution_agency.label"
                                                :value="does_financial_institution_agency.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.does_financial_institution_agency']">
                                              {{errors['form.does_financial_institution_agency'][0]}}
                                          </span>
                                  <el-input size="small"  placeholder="وسيلة الاتصال الأخري" v-if="form.does_financial_institution_agency == 'X'" v-model="form.does_financial_institution_agency_Anther"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.does_financial_institution_agency']">
                                          {{errors['form.does_financial_institution_agency'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.does_financial_institution_agency_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.does_financial_institution_agency_Notes']">
                                                {{errors['form.does_financial_institution_agency_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                               <tr v-if="form.Have_ever_loan == '١'">
                                    <td>
                                          <span class="demonstration block"> ٦١٨	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.lender_reinstate_case') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.lender_reinstate_case" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="lender_reinstate_case in yesOrno"
                                                :key="lender_reinstate_case.value"
                                                :label="lender_reinstate_case.label"
                                                :value="lender_reinstate_case.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.lender_reinstate_case']">
                                              {{errors['form.lender_reinstate_case'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.lender_reinstate_case_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.lender_reinstate_case_Notes']">
                                                {{errors['form.lender_reinstate_case_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                              <tr v-if="form.Have_ever_loan == '١' && form.lender_reinstate_case !== '١'" >
                                    <td>
                                          <span class="demonstration block"> ٦١٩	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.reschedule_loan_case') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.reschedule_loan_case" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="reschedule_loan_case in yesOrno"
                                                :key="reschedule_loan_case.value"
                                                :label="reschedule_loan_case.label"
                                                :value="reschedule_loan_case.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.reschedule_loan_case']">
                                              {{errors['form.reschedule_loan_case'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.reschedule_loan_case_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.reschedule_loan_case_Notes']">
                                                {{errors['form.reschedule_loan_case_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                              <tr v-if="form.Have_ever_loan == '١' && form.lender_reinstate_case !== '١'">
                                    <td>
                                          <span class="demonstration block"> ٦٢٠	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.tell_institution_response') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.tell_institution_response" placeholder="اختر" >
                                              <el-option
                                                v-for="tell_institution_response in tell_institution_responses"
                                                :key="tell_institution_response.value"
                                                :label="tell_institution_response.label"
                                                :value="tell_institution_response.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.tell_institution_response']">
                                              {{errors['form.tell_institution_response'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.tell_institution_response_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.tell_institution_response_Notes']">
                                                {{errors['form.tell_institution_response_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                               <tr v-if="form.Have_ever_loan == '١' && form.lender_reinstate_case !== '١'">
                                    <td>
                                          <span class="demonstration block"> ٦٢١	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.lending_institution_resort') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.lending_institution_resort" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="lending_institution_resort in yesOrno"
                                                :key="lending_institution_resort.value"
                                                :label="lending_institution_resort.label"
                                                :value="lending_institution_resort.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.lending_institution_resort']">
                                              {{errors['form.lending_institution_resort'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.lending_institution_resort_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.lending_institution_resort_Notes']">
                                                {{errors['form.lending_institution_resort_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>


                              <tr v-if="form.Have_ever_loan == '١' &&  form.lender_reinstate_case !== '١' && form.lending_institution_resort !== '٢' ">
                                    <td>
                                          <span class="demonstration block"> ٦٢٢	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.many_receipts_been_submitted') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.many_receipts_been_submitted" placeholder="اختر" >
                                              <el-option
                                                v-for="many_receipts_been_submitted in many_receipts_been_submitteds"
                                                :key="many_receipts_been_submitted.value"
                                                :label="many_receipts_been_submitted.label"
                                                :value="many_receipts_been_submitted.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.many_receipts_been_submitted']">
                                              {{errors['form.many_receipts_been_submitted'][0]}}
                                          </span>

                                        <el-input size="small" type="number" placeholder="اذكر العدد" v-if="form.many_receipts_been_submitted == '٢'" v-model="form.many_receipts_been_submitted_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.many_receipts_been_submitted_number']">
                                          {{errors['form.many_receipts_been_submitted_number'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.many_receipts_been_submitted_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.many_receipts_been_submitted_Notes']">
                                                {{errors['form.many_receipts_been_submitted_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                               <tr v-if="form.Have_ever_loan == '١' && form.lender_reinstate_case !== '١'  && form.lending_institution_resort !== '٢' ">
                                    <td>
                                          <span class="demonstration block"> ٦٢٣	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.ruling_these_receipts') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.ruling_these_receipts" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="ruling_these_receipts in yesOrno"
                                                :key="ruling_these_receipts.value"
                                                :label="ruling_these_receipts.label"
                                                :value="ruling_these_receipts.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.ruling_these_receipts']">
                                              {{errors['form.ruling_these_receipts'][0]}}
                                          </span>


                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.ruling_these_receipts_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.ruling_these_receipts_Notes']">
                                                {{errors['form.ruling_these_receipts_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>


                              <tr v-if="form.Have_ever_loan == '١' && form.lender_reinstate_case !== '١'  && form.lending_institution_resort !== '٢' ">
                                    <td>
                                          <span class="demonstration block"> ٦٢٤	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.tell_dispute_ended') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.tell_dispute_ended" placeholder="اختر" >
                                              <el-option
                                                v-for="tell_dispute_ended in tell_dispute_endeds"
                                                :key="tell_dispute_ended.value"
                                                :label="tell_dispute_ended.label"
                                                :value="tell_dispute_ended.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.tell_dispute_ended']">
                                              {{errors['form.tell_dispute_ended'][0]}}
                                          </span>

                                        <el-input size="small"  placeholder="اذكر المدة" v-if="form.tell_dispute_ended == '١'" v-model="form.tell_dispute_ended_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.tell_dispute_ended_number_number']">
                                          {{errors['form.tell_dispute_ended_number_number'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.tell_dispute_ended_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.tell_dispute_ended_Notes']">
                                                {{errors['form.tell_dispute_ended_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                               <tr v-if="form.Have_ever_loan == '١'">
                                    <td>
                                          <span class="demonstration block"> ٦٢٥	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.what_reasons_pushed') }}  </p>
                                    </td>
                                    <td>
                                    <el-input size="small"  placeholder="السبب الاول" v-model="form.what_reasons_pushed1"  ></el-input>
                                          <span class="text-danger" v-if="errors['form.what_reasons_pushed1']">
                                              {{errors['form.what_reasons_pushed1'][0]}}
                                          </span>


                                            <el-input size="small"  placeholder="السبب الثاني" v-model="form.what_reasons_pushed2"  ></el-input>
                                          <span class="text-danger" v-if="errors['form.what_reasons_pushed2']">
                                              {{errors['form.what_reasons_pushed2'][0]}}
                                          </span>

                                            <el-input size="small"  placeholder="السبب الثالث" v-model="form.what_reasons_pushed3"  ></el-input>
                                          <span class="text-danger" v-if="errors['form.what_reasons_pushed3']">
                                              {{errors['form.what_reasons_pushed3'][0]}}
                                          </span>


                                            <el-input size="small"  placeholder="السبب الرابع" v-model="form.what_reasons_pushed4"  ></el-input>
                                          <span class="text-danger" v-if="errors['form.what_reasons_pushed4']">
                                              {{errors['form.what_reasons_pushed4'][0]}}
                                          </span>

                                        <el-input size="small"  placeholder="اذكر المدة" v-if="form.what_reasons_pushed == '١'" v-model="form.what_reasons_pushed_number"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.what_reasons_pushed_number']">
                                          {{errors['form.what_reasons_pushed_number'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.what_reasons_pushed_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.what_reasons_pushed_Notes']">
                                                {{errors['form.what_reasons_pushed_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>

                          </tbody>
                      </table>
                    </el-tab-pane>


                      <el-tab-pane>  <!--  start for social_solidarity -->
                    <span slot="label"><i class="far fa-handshake"></i> {{ $trans('app.social_solidarity') }}  </span>

                      <table class="table table-bordered table-responsive  border-primary mt-4" >
                        <!--  start table social solidarity -->
                          <thead>
                            <tr>
                              <th scope="col">{{ $trans('app.num') }} </th>
                              <th scope="col">{{ $trans('app.pointer') }}</th>
                              <th scope="col">{{ $trans('app.Evaluation') }}</th>
                              <th scope="col">{{ $trans('app.Notes') }}</th>


                            </tr>
                          </thead>
                          <tbody>

                              <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠١	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.take_help_from_charitable') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.take_help_from_charitable" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="take_help_from_charitable in yesOrno"
                                                :key="take_help_from_charitable.value"
                                                :label="take_help_from_charitable.label"
                                                :value="take_help_from_charitable.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.take_help_from_charitable']">
                                              {{errors['form.take_help_from_charitable'][0]}}
                                          </span>


                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.take_help_from_charitable_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.take_help_from_charitable_Notes']">
                                                {{errors['form.take_help_from_charitable_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>


                                  <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠٢	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.assistance_regular') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.assistance_regular" placeholder="اختر" >
                                              <el-option
                                                v-for="assistance_regular in assistance_regulars"
                                                :key="assistance_regular.value"
                                                :label="assistance_regular.label"
                                                :value="assistance_regular.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.assistance_regular']">
                                              {{errors['form.assistance_regular'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.assistance_regular_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.assistance_regular_Notes']">
                                                {{errors['form.assistance_regular_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                                   <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠٣	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.aid_cash_or_kind') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.aid_cash_or_kind" placeholder="اختر" >
                                              <el-option
                                                v-for="aid_cash_or_kind in aid_cash_or_kinds"
                                                :key="aid_cash_or_kind.value"
                                                :label="aid_cash_or_kind.label"
                                                :value="aid_cash_or_kind.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.aid_cash_or_kind']">
                                              {{errors['form.aid_cash_or_kind'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.aid_cash_or_kind_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.aid_cash_or_kind_Notes']">
                                                {{errors['form.aid_cash_or_kind_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                                   <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠٤	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.benefited_from_projects') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.benefited_from_projects" placeholder="نعم/لا" >
                                              <el-option
                                                v-for="benefited_from_projects in yesOrno"
                                                :key="benefited_from_projects.value"
                                                :label="benefited_from_projects.label"
                                                :value="benefited_from_projects.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.benefited_from_projects']">
                                              {{errors['form.benefited_from_projects'][0]}}
                                          </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.benefited_from_projects_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.benefited_from_projects_Notes']">
                                                {{errors['form.benefited_from_projects_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                              <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠٥	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.charities_have_benefited') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.charities_have_benefited" placeholder="اختر" >
                                              <el-option
                                                v-for="charities_have_benefited in charities_have_benefiteds"
                                                :key="charities_have_benefited.value"
                                                :label="charities_have_benefited.label"
                                                :value="charities_have_benefited.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.charities_have_benefited']">
                                              {{errors['form.charities_have_benefited'][0]}}
                                          </span>

                                      <el-input size="small"  placeholder="اذكر الجمعية" v-if="form.charities_have_benefited == 'X'" v-model="form.charities_have_benefited_anther"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.charities_have_benefited_anther']">
                                          {{errors['form.charities_have_benefited_anther'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.charities_have_benefited_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.charities_have_benefited_Notes']">
                                                {{errors['form.charities_have_benefited_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                                  <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠٦	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.areas_benefit') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.areas_benefit" placeholder="اختر" >
                                              <el-option
                                                v-for="areas_benefit in areas_benefits"
                                                :key="areas_benefit.value"
                                                :label="areas_benefit.label"
                                                :value="areas_benefit.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.areas_benefit']">
                                              {{errors['form.areas_benefit'][0]}}
                                          </span>

                                      <el-input size="small"  placeholder="اذكر المجالات" v-if="form.areas_benefit == 'X'" v-model="form.areas_benefit_anther"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.areas_benefit_anther']">
                                          {{errors['form.areas_benefit_anther'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.areas_benefit_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.areas_benefit_Notes']">
                                                {{errors['form.areas_benefit_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>



                                <tr>
                                    <td>
                                          <span class="demonstration block"> ٧٠٧	</span>
                                    </td>
                                    <td>
                                      <p class="text-size"> {{ $trans('app.most_important_needs') }}  </p>
                                    </td>
                                    <td>
                                        <el-select  v-model="form.most_important_needs" placeholder="اختر" >
                                              <el-option
                                                v-for="most_important_needs in areas_benefits"
                                                :key="most_important_needs.value"
                                                :label="most_important_needs.label"
                                                :value="most_important_needs.value">
                                              </el-option>
                                            </el-select>
                                          <span class="text-danger" v-if="errors['form.most_important_needs']">
                                              {{errors['form.most_important_needs'][0]}}
                                          </span>

                                      <el-input size="small"  placeholder="اذكر الاحتياج المطلوب" v-if="form.most_important_needs == 'X'"  v-model="form.most_important_needs_anther"  ></el-input>
                                      <span class="text-danger" v-if="errors['form.most_important_needs_anther']">
                                          {{errors['form.most_important_needs_anther'][0]}}
                                      </span>
                                    </td>
                                    <td>
                                          <div class="width-table">
                                          <el-input type="textarea" size="small" placeholder="اكتب ملاحظتك" v-model="form.most_important_needs_Notes"  ></el-input>
                                            <span class="text-danger" v-if="errors['form.most_important_needs_Notes']">
                                                {{errors['form.most_important_needs_Notes'][0]}}
                                            </span>
                                          </div>
                                    </td>
                              </tr>






                          </tbody>
                          </table>
                              <h5 class="text-center">( {{ $trans('app.Thanks_respondent') }} <i class="far fa-laugh-beam"></i> ) </h5>
                       </el-tab-pane>
                       <!-- Start button Send searchCase -->
                            <div class="text-center mt-4" >
                                  <el-button type="primary"  class="button-submit" v-loading="loadingButton"   element-loading-background="rgba(23, 7, 54, 0.2)" :disabled="loadingButton" @click.prevent="addsearchCase()" round>{{ $trans('app.send_search') }}</el-button>
                            </div>
                        <!-- End  button Send searchCase -->
                      </el-tabs>








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


        loadingForm: true,
        loadingButton: false,
         activeNames: ['1'],
         pickerOptions: {
          disabledDate(time) {
            return time.getTime() > Date.now();
          },
        },
        attachments:[],
        activeName: 'first',
        date: '',
        value: '',
        Provinces: {},
        user:[],
        Supervisor:[],
        active: 0,
        reason_amputation1 : '',
        reason_amputation2 : '',
        reason_amputation3 : '',
        amputation_level1 : '',
        amputation_level2 : '',
        amputation_level3 : '',
        amputation_case1 :  '',
        amputation_case2 :  '',
        amputation_case3 :  '',

        search_registrations : [{
           family_person_name1: '',
        }],

        form:{
            date: '',
        Total_number_visits: 1,
            image: '',
            styleObject: {
            width: '100px',
            height: '100px',
             },
             show_disability: 'false',
            the_person_handicapped1:'',
            the_person_handicapped2:'',
            the_person_handicapped3:'',
        },
        disabilities:{
            currently_studying1: '',
            currently_studying2: '',
            currently_studying3: '',
        },
        images:[{
            type:'image',
        }],

        errors:{},



          radio: '1',

      results: [{
          value: '١',
          label: 'تمت'
        }, {
          value: '٢',
          label: 'لايوجد فرد من افراد الأسرة بالمنزل'
        }, {
          value: '٩',
          label: 'اخري'
        }],

  Relationship_head_familys: [{
          value: '١',
          label: 'رب الأسرة'
        }, {
          value: '٢',
          label: 'زوج/زوجة'
        }, {
          value: '٣',
          label: 'ابن/ابنة'
        }, {
          value: '٤',
          label: 'أب/أم'
        }, {
          value: '٥',
          label: 'حفيد/ة'
        }, {
          value: '٦',
          label: 'زوج أم/زوجة أب'
        }, {
          value: '٧',
          label: 'اخري تذكر'
        }],

        Genders: [{
          value: '١',
          label: 'ذكر'
        }, {
          value: '٢',
          label: 'أنثي'
        }],

        educations: [{
          value: '١',
          label: 'اقل من السن'
        }, {
          value: '٢',
          label: 'اُمي'
        }, {
          value: '٣',
          label: 'يقرأ ويكتب'
        }, {
          value: '٤',
          label: 'في سن المدرسة ويدرس '
        }, {
          value: '٥',
          label: 'اقل من المتوسط'
        }, {
          value: '٦',
          label: 'متوسط / فوق المتوسط'
        }, {
          value: '٧',
          label: 'جامعي فأعلي'
        }, {
          value: '٨',
          label: 'في سن الجامعة ويدرس'
        }],

        leave_educations_and_Why_dont_agree_educations: [{
          value: 'A',
          label: 'كرة المدرسة'
        }, {
          value: 'B',
          label: 'صعوبة الوصول إلي المدرسة'
        }, {
          value: 'C',
          label: 'تكرار الرسوب/ ضعف المستوي'
        }, {
          value: 'D',
          label: 'اصابة بمرض او اعاقة منعته'
        }, {
          value: 'E',
          label: 'الرغبة في تعلم صنعه'
        }, {
          value: 'F',
          label: 'عدم رغبة الاسرة في تعليم ابناءها'
        }, {
          value: 'G',
          label: 'تكاليف التعليم مرتفعة'
        }, {
          value: 'H',
          label: 'عدم رغبة الفرد في التعليم'
        },{
          value: 'I',
          label: 'تفادي الاختلاط'
        },{
          value: 'G',
          label: 'العمل لمساعدة الاسرة ماليا'
        },{
          value: 'K',
          label: 'اصبحت عائلا للاسرة'
        },{
          value: 'L',
          label: 'عدم الاحساس باهمية التعليم'
        },{
          value: 'M',
          label: 'الزواج (إناث)'
        },{
          value: 'X',
          label: 'أخري تذكر'
        }],

        yesOrno:[{
          value: '١',
          label: 'نعم'
        },{
          value: '٢',
          label: 'لا'
        }],


        Social_statuss:[{
          value: '١',
          label: 'اقل من السن'
        }, {
          value: '٢',
          label: 'اعزب'
        }, {
          value: '٣',
          label: 'متزوج'
        }, {
          value: '٤',
          label: 'مطلق'
        }, {
          value: '٥',
          label: 'ارمل'
        }, {
          value: '٦',
          label: 'هجر'
        }, {
          value: '٧',
          label: 'انفصال (للاقباط)'
        }, {
          value: '٨',
          label: 'عقد قران'
        }],

        works:[
          {
           value: '١',
          label: 'يعمل'
          },{
            value: '٢',
          label: 'لا يعمل/ يبحث عن عمل'
          }],

          nature_work_situations:[{
          value: '١',
          label: 'بأجر ومؤمن علية'
        }, {
          value: '٢',
          label: 'بأجر  وغير مؤمن علية'
        }, {
          value: '٣',
          label: 'لحسابه ومؤمن علية'
        }, {
          value: '٤',
          label: 'لحسابة وغير مؤمن علية'
        }, {
          value: '٥',
          label: 'لا يعمل سابقاً او حالياً'
        }, {
          value: '٦',
          label: 'خارج قوة العمل/القوة البشرية'
        }, {
          value: '٧',
          label: 'تطوع بجمعيات أهلية'
        }, {
          value: '٨',
          label: 'لدي الأسرة بدون أجر'
          }],

          regularity_at_works:[{
            value: '١',
            label: 'دائم'
          },{
            value: '٢',
            label: 'بعض الوقت'
          },{
            value: '٣',
            label: 'غير دائم'
          },{
            value: '٤',
            label: 'موسمي'
          }],


          business_sectors:[{
            value: '١',
            label: 'حكومي/عام'
          },{
            value: '٢',
            label: 'خاص/استثماري/مشترك'
          },{
            value: '٣',
            label: 'خارج المنشأت'
          },{
            value: '٤',
            label: 'اخري'
          }, {
          value: '٥',
          label: 'جمعيات أهلية'
        }],


        sector_economic_activitys: [{
          value: '١',
          label: 'الزراعة'
        }, {
          value: '٢',
          label: 'القطاع الغذائي'
        }, {
          value: '٣',
          label: 'القطاع الصناعي'
        }, {
          value: '٤',
          label: 'القطاع التجاري'
        }, {
          value: '٥',
          label: 'القطاع الخدمي'
        }, {
          value: '٦',
          label: 'قطاع التشييد والبناء'
        }, {
          value: '٧',
          label: 'أعمال حرفية'
        }],

        What_are_practical_skills: [{
          value: 'A',
          label: 'سباكه'
        }, {
          value: 'B',
          label: 'تجارة'
        }, {
          value: 'C',
          label: 'نقاشة'
        }, {
          value: 'D',
          label: 'ميكانيكا'
        }, {
          value: 'E',
          label: 'سمكرة'
        }, {
          value: 'F',
          label: 'كهربا'
        }, {
          value: 'G',
          label: 'تصليح اجهزة'
        }, {
          value: 'H',
          label: 'مبلط'
        },{
          value: 'I',
          label: 'محارة'
        },{
          value: 'X',
          label: 'اخري'
        }],


        Social_Security: [{
          value: '١',
          label: 'مشترك'
        }, {
          value: '٢',
          label: 'مستفيد'
        }, {
          value: '٣',
          label: 'مشترك ومستفيد'
        }, {
          value: '٤',
          label: 'غير مشترك وغير مستفيد'
        }],


        health_insurances: [{
          value: '١',
          label: 'يوجد'
        }, {
          value: '٢',
          label: 'لا يوجد'
        }],



        Define_chronic_diseases: [{
          value: 'A',
          label: 'قلب مزمن'
        }, {
          value: 'B',
          label: 'تنفس مزمن'
        }, {
          value: 'C',
          label: 'فقرات مزمنة'
        }, {
          value: 'D',
          label: 'أمراض كلي '
        }, {
          value: 'E',
          label: 'كبد مزمن'
        }, {
          value: 'F',
          label: 'التهاب اعصاب مزمن'
        }, {
          value: 'G',
          label: 'سل'
        }, {
          value: 'H',
          label: 'جذام'
        },{
          value: 'I',
          label: 'الفلاريا (داء الفيل)'
        },{
          value: 'J',
          label: 'سرطان'
        },{
          value: 'K',
          label: 'نقص المناعة (إيدز)'
        },{
          value: 'L',
          label: 'إكتئاب حاد'
        },{
          value: 'X',
          label: 'أخري تذكر'
        }],


        yesOrno:[{
          value: '١',
          label: 'نعم'
        },{
          value: '٢',
          label: 'لا'
        }],



        housing_types: [{
          value: '١',
          label: 'فيلا أو أكثر من شقة'
        }, {
          value: '٢',
          label: 'شقة مستقلة'
        }, {
          value: '٣',
          label: 'منزل ريفي'
        }, {
          value: '٤',
          label: 'غرفة في وحدة سكنيه'
        }, {
          value: '٥',
          label: 'غرفة مستقلة أو أكثر'
        }, {
          value: '٦',
          label: 'عشة'
        }, {
          value: '٧',
          label: 'أخري'
        }],

         last_method_used:[{
          value: '١',
          label: 'الوحدة الصحية'
        }, {
          value: '٢',
          label: 'وحدة خارج القرية'
        }, {
          value: '٣',
          label: 'عيادة خاصة'
        }, {
          value: '٤',
          label: 'الصيدلية'
        }, {
          value: '٥',
          label: 'عيادة الجمعية'
        }, {
          value: '٦',
          label: 'عيادة متنقلة'
        }, {
          value: '٩',
          label: 'أخري'
        }],

        home_ownerships: [{
          value: '١',
          label: 'إيجار'
        }, {
          value: '٢',
          label: 'تمليك'
        }, {
          value: '٣',
          label: 'أخري'
        }],


        type_walls_dwellings: [{
          value: '١',
          label: 'طوب وأسمنت/مسلح/حجارة'
        }, {
          value: '٢',
          label: 'أخري'
        }],


        amputation_types: [{
          value: '١',
          label: 'تحت الركبة'
        }, {
          value: '٢',
          label: 'فوق الركبة'
        }, {
          value: '٣',
          label: 'تحت الكوع'
        }, {
          value: '٤',
          label: 'فوق الكوع'
        }, {
          value: '٩',
          label: 'أخري تذكر'
        }],



        type_roofs: [{
          value: '١',
          label: 'اسمنت'
        }, {
          value: '٢',
          label: 'خشب/قنالتكس/فينيل'
        }, {
          value: '٣',
          label: 'أخري'
        }],

        Type_floorings: [{
          value: '١',
          label: 'بلاط/رخام/سيراميك'
        }, {
          value: '٢',
          label: 'ترابية أو أخري'
        }, {
          value: '٣',
          label: 'خشب/قنالتكس/فينيل'
        }, {
          value: '٤',
          label: 'أسمنت'
        }],

        material_roof_houses: [{
          value: '١',
          label: 'جريد وقش'
        }, {
          value: '٢',
          label: 'طين'
        }, {
          value: '٣',
          label: 'الواح خشبية'
        }, {
          value: '٤',
          label: 'الأسمنت المسلح'
        }, {
          value: '٥',
          label: 'الواح صاج'
        }, {
          value: '٦',
          label: 'أخري'
        }],

        material_wall_houses: [{
          value: '١',
          label: 'الطوب اللبن'
        }, {
          value: '٢',
          label: 'الطوب الأحمر والطين'
        }, {
          value: '٣',
          label: 'الطوب الأحمر والأسمنت'
        }, {
          value: '٤',
          label: 'محارة'
        }, {
          value: '٥',
          label: 'أخري'
        }],


      water_sources: [{
          value: '١',
          label: 'شبكة عامة'
        }, {
          value: '٢',
          label: 'طلمبة'
        }, {
          value: '٣',
          label: 'أخري تذكر'
        }],


        Having_toilets: [{
          value: '١',
          label: 'خاصة'
        }, {
          value: '٢',
          label: 'مشتركة'
        }, {
          value: '٣',
          label: 'لا يوجد'
        }],



        toilet_types: [{
          value: '١',
          label: 'افرنجي سيفون'
        }, {
          value: '٢',
          label: 'بلدي سيفون'
        }, {
          value: '٣',
          label: 'بلدي بدون سيفون'
        }, {
          value: '٤',
          label: 'أخري'
        }],


        Water_connections: [{
          value: '١',
          label: 'حنفية داخل المنزل'
        }, {
          value: '٢',
          label: 'حنفية خارج المنزل'
        }, {
          value: '٣',
          label: 'غير متصل'
        }],



        connected_electricitys: [{
          value: '١',
          label: 'متصل'
        }, {
          value: '٢',
          label: 'غير متصل'
        }],


        type_sewages: [{
          value: '١',
          label: 'شبكة عامة'
        }, {
          value: '٢',
          label: 'شبكة خاصة'
        }, {
          value: '٣',
          label: 'ترنش'
        }, {
          value: '٤',
          label: 'لا يوجد'
        }, {
          value: '٥',
          label: 'أخري'
        }],


      used_kitchen_fuels: [{
          value: '١',
          label: 'بوتجاز'
        }, {
          value: '٢',
          label: 'غاز طبيعي'
        }, {
          value: '٣',
          label: 'كروسين'
        }, {
          value: '٤',
          label: 'كهرباء'
        }, {
          value: '٥',
          label: 'أخري'
        }],


        Garbage_collection_methods: [{
          value: '١',
          label: 'جماع للقمامة'
        }, {
          value: '٢',
          label: 'شركة'
        }, {
          value: '٣',
          label: 'أخري'
        }],


        mechanical_ration_cards: [{
          value: '١',
          label: 'نعم'
        }, {
          value: '٢',
          label: 'لا'
        }, {
          value: '٣',
          label: 'مقيد ببطاقة أحد الوالدين'
        }],


        cash_support_programs:[{
          value: 'A',
          label: 'تكافل'
        }, {
          value: 'B',
          label: 'كرامة'
        }, {
          value: 'C',
          label: 'الضمان الإجتماعي'
        }, {
          value: 'D',
          label: 'دعم شهري من الجمعيات'
        }],




        sed_first_times:[{
          value: '١',
          label: 'الحبوب'
        }, {
          value: '٢',
          label: 'اللولب'
        }, {
          value: '٣',
          label: 'الحقن'
        }, {
          value: '٤',
          label: 'كبسولات تحت الجلد'
        }, {
          value: '٥',
          label: 'إطالة فترة الرضاعة'
        }, {
          value: '٩',
          label: 'أخري'
        }],


        intend_method_futures: [{
          value: '١',
          label: 'نرغب في الإنجاب'
        }, {
          value: '٢',
          label: 'عدم القدرة في الانجاب'
        }, {
          value: '٣',
          label: 'سن اليأس/استئصال الرحم'
        }, {
          value: '٤',
          label: 'معارضة الزوج'
        }, {
          value: '٥',
          label: 'محرمة دينياً'
        }, {
          value: '٦',
          label: 'اعتبارات صحية'
        }, {
          value: '٧',
          label: 'الاعراض الجانبية'
        }, {
          value: '٨',
          label: 'عدم توافر الوسيلة'
        }, {
          value: '٩',
          label: 'صعوبة الحصول عليها'
        }, {
          value: '١٠',
          label: 'التكلفة المرتفعة'
        }, {
          value: '٩٩',
          label: 'أخري'
        }],





        purification: [{
          value: '١',
          label: 'نستمر'
        }, {
          value: '٢',
          label: 'نتوقف'
        }, {
          value: '٣',
          label: 'لا أعرف'
        }],

        What_project_activitys: [{
          value: 'A',
          label: 'مشروع تجاري'
        }, {
          value: 'B',
          label: 'مشروع  حيواني'
        }, {
          value: 'C',
          label: 'مشروع حرفي'
        },{
          value: 'X',
          label: 'أخري'
        }],



        Why_will_take_loans: [{
          value: '١',
          label: 'مشروع'
        }, {
          value: '٢',
          label: 'تسديد ديون'
        }, {
          value: '٣',
          label: 'زواج أبناء'
        }, {
          value: '٤',
          label: 'إجراء عملية'
        }, {
          value: '٥',
          label: 'بناء دور بالمنزل'
        }, {
          value: '٦',
          label: 'تحديد/صيانة المنزل'
        }, {
          value: '٩',
          label: 'أخري'
        }],


        What_with_another_loans: [{
          value: 'A',
          label: 'عمل مشروع'
        }, {
          value: 'B',
          label: 'تسديد ديون'
        }, {
          value: 'C',
          label: 'زواج أحد أفراد الأسرة'
        }, {
          value: 'D',
          label: 'علاج/جراحة لأحد أفراد الأسرة'
        }, {
          value: 'E',
          label: 'بناء منزل/ شراء شقة'
        }, {
          value: 'F',
          label: 'عمل صيانة/ترميم بالمنزل'
        },{
          value: 'X',
          label: 'أخري تذكر'
        }],




        tell_nature_loans: [{
          value: '١',
          label: 'قرض بدون أيه ضمانات'
        }, {
          value: '٢',
          label: 'قرض بضمانات شخصية'
        }, {
          value: '٣',
          label: 'قرض برهن عقاري'
        },{
          value: '٩',
          label: 'أخري تذكر'
        }],


        papers_required_loans: [{
          value: '١',
          label: 'صورة بطاقة الرقم القومي'
        }, {
          value: '٢',
          label: 'ايصال مرافق حديث (مياة - كهرباء)'
        }, {
          value: '٣',
          label: 'صورة مستخرج حديث للسجل التجاري والبطاقة الضريبية'
        }, {
          value: '٤',
          label: 'مفردات مرتب'
        }, {
          value: '٩',
          label: 'أخري تذكر'
        }],



        how_long_takes_responds: [{
          value: '١',
          label: 'أقل من أسبوع'
        }, {
          value: '٢',
          label: 'من أسبوع إلي شهر'
        }, {
          value: '٣',
          label: 'أكثر من شهر'
        }, {
          value: '٩',
          label: 'أخري تذكر'
        }],




        what_guarantees_provideds: [{
          value: '١',
          label: 'ضامن شخصي'
        }, {
          value: '٢',
          label: 'رهب عقاري(أرض - عقار)'
        }, {
          value: '٣',
          label: 'رهب علي أصول منقولة'
        }, {
          value: '٤',
          label: 'ايصالات امانة عليا وحدي'
        }, {
          value: '٥',
          label: 'ايصالات امانه علي انا والضامن'
        },{
          value: '٩',
          label: 'اخري تذكر'
        }],



        receipts_spent_value_loan_increases: [{
          value: '١',
          label: 'نفس  القيمة'
        }, {
          value: '٢',
          label: 'زيادة من القيمة'
        }, {
          value: '٣',
          label: 'وقعت علي بياض'
        }],


        say_result_delays: [{
          value: '١',
          label: 'دفع فائدة'
        }, {
          value: '٢',
          label: 'دفع رسوم'
        }, {
          value: '٣',
          label: 'لا شئ'
        },{
          value: '٩',
          label: 'اخري تذكر'
        }],


        does_financial_institution_agencys: [{
          value: 'A',
          label: 'المكالمات الهاتفية'
        }, {
          value: 'B',
          label: 'خطابات'
        }, {
          value: 'C',
          label: 'مقابلات/زيارات'
        }, {
          value: 'D',
          label: 'البريد الالكتروني'
        }, {
          value: 'E',
          label: 'رسالات نصية'
        }, {
          value: 'F',
          label: 'لم يتصل بي أحد'
        },{
          value: 'X',
          label: 'أخري تذكر'
        }],


        tell_institution_responses: [{
          value: '١',
          label: 'المؤسسة رفضت الطلب'
        }, {
          value: '٢',
          label: 'تمت المناقشات ولم نصل إلي اتفاق'
        }, {
          value: '٣',
          label: 'تم قبول إعادة جدولةالقرض'
        }],

      many_receipts_been_submitteds: [{
          value: '١',
          label: 'كل الإيصالات'
        }, {
          value: '٢',
          label: 'عدد منها'
        }],




        tell_dispute_endeds: [{
          value: '١',
          label: 'نعم اتفض'
        }, {
          value: '٢',
          label: 'لم ينفض النزاع'
        }],


        assistance_regulars: [{
          value: '١',
          label: 'شهرية'
        }, {
          value: '٢',
          label: 'موسمية'
        }, {
          value: '٣',
          label: 'سنوية'
        }, {
          value: '٤',
          label: 'غير منتظمة'
        }],


          aid_cash_or_kinds: [{
          value: '١',
          label: 'نقدية'
        }, {
          value: '٢',
          label: 'عينية'
        }, {
          value: '٣',
          label: 'نقدية وعينية'
        }, {
          value: '٤',
          label: 'رعاية صحية'
        }],


        charities_have_benefiteds: [{
          value: 'A',
          label: 'مؤسسة مصر الخير'
        }, {
          value: 'B',
          label: 'جمعية الأرمان'
        }, {
          value: 'C',
          label: 'مؤسسة صناع الخير للتنمية'
        }, {
          value: 'D',
          label: 'مؤسسة صناع الحياة'
        }, {
          value: 'E',
          label: 'بنك الطعام المصري'
        }, {
          value: 'F',
          label: 'جمعية التطوير والتنمية'
        },{
          value: 'G',
          label: 'بنك الحياة الكريمة'
        },{
          value: 'H',
          label: 'مؤسسة العربي'
        },{
          value: 'I',
          label: 'بنك الشفاء المصري'
        },{
          value: 'J',
          label: 'اسمعونا'
        },{
          value: 'K',
          label: 'جمعية راعي مصر'
        } ,{
          value: 'L',
          label: 'جمعية مصطفي محمود'
        } ,{
          value: 'M',
          label: 'الهيئة القبطية الإنجيلية'
        } ,{
          value: 'N',
          label: 'الطفولة والتنمية بأسيوط'
        } ,{
          value: 'O',
          label: 'رعاية أطفال السجينات'
        } ,{
          value: 'P',
          label: 'مؤسسة بصيرة'
        } ,{
          value: 'Q',
          label: 'مؤسسة مصر للصحة والتنمية'
        }
        ,{
          value: 'X',
          label: 'أخري تذكر'
        }],



        areas_benefits: [{
          value: 'A',
          label: 'محو الأمية'
        }, {
          value: 'B',
          label: 'تسديد ديون'
        }, {
          value: 'C',
          label: 'أكشاك'
        }, {
          value: 'D',
          label: 'علاج/إجراء عمليات'
        }, {
          value: 'E',
          label: 'مشروع مواشي'
        }, {
          value: 'F',
          label: 'ترميم منازل'
        },{
          value: 'G',
          label: 'مصروفات تعليم'
        },{
          value: 'H',
          label: 'كراتين غذاء'
        },{
          value: 'I',
          label: 'بطاطين'
        },{
          value: 'J',
          label: 'اعادة بناء'
        },{
          value: 'K',
          label: 'سقف'
        } ,{
          value: 'L',
          label: 'بناء دورة مياة'
        } ,{
          value: 'M',
          label: 'ترنش'
        } ,{
          value: 'N',
          label: 'صرف صحي'
        } ,{
          value: 'O',
          label: 'توصيل مياة'
        } ,{
          value: 'P',
          label: 'كهرباء'
        } ,{
          value: 'Q',
          label: 'مستلزمات منزل'
        },{
          value: 'R',
          label: 'اجهزة تعويضيه'
        },{
          value: 'S',
          label: 'تزوج أيتام'
        },{
          value: 'T',
          label: 'تجهيز عرائس'
        },{
          value: 'U',
          label: 'تقديم مشروع'
        },{
          value: 'V',
          label: 'قروض'
        },{
          value: 'X',
          label: 'أخري تذكر'
        }],

          type_of_disabilitys: [{
          value: '١',
          label: 'ذهنية'
        }, {
          value: '٢',
          label: 'سمعية'
        }, {
          value: '٣',
          label: 'بصرية'
        }, {
          value: '٤',
          label: 'حركية'
        }, {
          value: '٥',
          label: 'سمع بصرية'
        }, {
          value: '٦',
          label: 'قصار قامة'
        }, {
          value: '٧',
          label: 'طيف توحد'
        }, {
          value: '٨',
          label: 'مرض مزمن'
        }, {
          value: '٩',
          label: 'صعوبات تعلم'
        }, {
          value: '١٠',
          label: 'متعدد الاعاقة'
        }, {
          value: '٩٩',
          label: 'أخري تذكر'
        }],



        degree_disabilitys: [{
          value: '١',
          label: 'خفيفة'
        }, {
          value: '٢',
          label: 'متوسطة'
        }, {
          value: '٣',
          label: 'عميقة'
        }],


        relevant_methods: [{
          value: 'A',
          label: 'نظارة'
        }, {
          value: 'B',
          label: 'سماعة'
        }, {
          value: 'C',
          label: 'قوقعة'
        }, {
          value: 'D',
          label: 'عصا بيضاء'
        }, {
          value: 'E',
          label: 'مشاية'
        }, {
          value: 'F',
          label: 'كرسي متحرك يدوي'
        },{
          value: 'G',
          label: 'كرسي متحرك كهربائي'
        },{
          value: 'H',
          label: 'عكازات'
        },{
          value: 'I',
          label: 'جهاز تعويضي يد'
        },{
          value: 'J',
          label: 'جهاز تعويضي قدم'
        },{
          value: 'K',
          label: 'حاس ألي مجهز'
        } ,{
          value: 'L',
          label: 'بتطبيقات'
        },{
          value: 'X',
          label: 'أخري تذكر'
        }],



        services_receives: [{
          value: 'A',
          label: 'طيبة (علاج دوائي/تحاليل/وأشعة/جراحة)'
        }, {
          value: 'B',
          label: 'تعلملية (الحاق بجامعات/مدارس/حضانات)'
        }, {
          value: 'C',
          label: 'تأهيل (علاج طبيعي/تخاطب/تعديل سلوك/ تدريب:تأهيل)'
        }, {
          value: 'D',
          label: 'أجهزة مساعدة(عصا/عكاكيز/كرسي متحرك،معينات سمعية ،معلينات بصرية)'
        }, {
          value: 'E',
          label: 'أجهزة تعويضية، أطرف صناعية'
        }, {
          value: 'F',
          label: 'شخص مساعد'
        },{
          value: 'G',
          label: 'ضمان اجتماعي/ معاش كرامة'
        },{
          value: 'H',
          label: 'توظيف'
        },{
          value: 'I',
          label: 'قروض/مشروعات صغيرة'
        },{
          value: 'J',
          label: 'بطاقة خدمات متكاملة'
        },{
          value: 'K',
          label: 'بطاقة تأهيل'
        } ,{
          value: 'L',
          label: 'بطاقة تموين'
        },{
          value: 'M',
          label: 'تأمين صحي'
        } ,{
          value: 'N',
          label: 'إسكان إجتماعي'
        } ,{
          value: 'O',
          label: 'برامج تدخل مبكر'
        } ,{
          value: 'X',
          label: 'أخري تذكر'
        }],


         the_services_obtained: [{
          value: 'A',
          label: 'طيبة (علاج دوائي/تحاليل/وأشعة/جراحة)'
        }, {
          value: 'B',
          label: 'تعلملية (الحاق بجامعات/مدارس/حضانات)'
        }, {
          value: 'C',
          label: 'تأهيل (علاج طبيعي/تخاطب/تعديل سلوك/ تدريب:تأهيل)'
        }, {
          value: 'D',
          label: 'أجهزة مساعدة(عصا/عكاكيز/كرسي متحرك،معينات سمعية ،معلينات بصرية)'
        }, {
          value: 'E',
          label: 'أجهزة تعويضية، أطرف صناعية'
        }, {
          value: 'F',
          label: 'شخص مساعد'
        },{
          value: 'G',
          label: 'ضمان اجتماعي/ معاش كرامة'
        },{
          value: 'H',
          label: 'توظيف'
        },{
          value: 'I',
          label: 'قروض/مشروعات صغيرة'
        },{
          value: 'J',
          label: 'بطاقة خدمات متكاملة'
        },{
          value: 'K',
          label: 'بطاقة تأهيل'
        } ,{
          value: 'L',
          label: 'بطاقة تموين'
        },{
          value: 'M',
          label: 'تأمين صحي'
        } ,{
          value: 'N',
          label: 'إسكان إجتماعي'
        } ,{
          value: 'X',
          label: 'أخري تذكر'
        }],


      have_ever_obtained: [{
          value: 'A',
          label: 'مركز/مستشفي حكومية'
        }, {
          value: 'B',
          label: 'مركز/مستشفي خاصة'
        }, {
          value: 'C',
          label: 'جمعيات أهلية'
        }, {
          value: 'D',
          label: 'شركات قطاع خاص'
        }, {
          value: 'E',
          label: 'حضانات ذوي إعاقة'
        }, {
          value: 'F',
          label: 'مراكز لغوية'
        },{
          value: 'G',
          label: 'مكاتب تأهيل'
        },{
          value: 'H',
          label: 'مراكز تأهيل'
        },{
          value: 'I',
          label: 'مصانع أطراف تعويضية'
        },{
          value: 'J',
          label: 'مراكز علاج طبيعي'
        },{
          value: 'K',
          label: 'مراكز قياس مهارات'
        } ,{
          value: 'L',
          label: 'مؤسسات تأهيل مهني'
        },{
          value: 'M',
          label: 'مؤسسات رعاية'
        } ,{
          value: 'N',
          label: 'مؤسسات توظيف'
        }  ,{
          value: 'X',
          label: 'أخري تذكر'
        }],




        cost_treatment: [{
          value: 'A',
          label: 'تأمين صحي'
        }, {
          value: 'B',
          label: 'علي نفقة الدولة'
        }, {
          value: 'C',
          label: 'علي نفقة جمعية أهلية'
        }, {
          value: 'D',
          label: 'تبرعات'
        }, {
          value: 'E',
          label: 'علي نفقة الشخص نفسة'
        } ,{
          value: 'X',
          label: 'أخري تذكر'
        }],


        current_educational_trip: [{
          value: '١',
          label: 'ابتدائي'
        }, {
          value: '٢',
          label: 'اعدادي'
        }, {
          value: '٣',
          label: 'ثانوي'
        }, {
          value: '٤',
          label: 'جامعي'
        }, {
          value: '٩',
          label: 'أخري تذكر'
        }],




        reason_for_not_attending: [{
          value: '١',
          label: 'دون السن'
        }, {
          value: '٢',
          label: 'أسباب مادية'
        }, {
          value: '٣',
          label: 'اجتماعية'
        }, {
          value: '٤',
          label: 'عدم قدرتة علي التعليم'
        }, {
          value: '٥',
          label: 'أنهي التعليم'
        },{
          value: '٩',
          label: 'أخري تذكر'
        }],


        yesNoDont: [{
          value: '١',
          label: 'نعم'
        }, {
          value: '٢',
          label: 'لا'
        }, {
          value: '٣',
          label: 'لا تعرف'
        }],



        reason_amputation: [{
          value: '١',
          label: 'حادث'
        }, {
          value: '٢',
          label: 'الاصابة بمرض'
        }, {
          value: '٣',
          label: 'اصابة حادة'
        }, {
          value: '٤',
          label: 'حروق مثلاً'
        },{
          value: '٩',
          label: 'أخري تذكر'
        }],



        amputation_case: [{
          value: '١',
          label: 'ملتئم'
        }, {
          value: '٢',
          label: 'غير ملتئم'
        }, {
          value: '٣',
          label: 'مترهل'
        }, {
          value: '٤',
          label: 'غير مترهل'
        },{
          value: '٩',
          label: 'أخري تذكر'
        }],


      amputation_level: [{
          value: '١',
          label: 'أسفل المنتصف'
        }, {
          value: '٢',
          label: 'مستوي المنتصف'
        }, {
          value: '٣',
          label: 'أعلي المنتصف'
        }, {
          value: '٩',
          label: 'أخري تذكر'
        }],


        party_status: [{
          value: '١',
          label: 'جيد'
        }, {
          value: '٢',
          label: 'بحاجة للتدخل'
        }],


        use_any_compensatory: [{
          value: '١',
          label: 'ممكن'
        }, {
          value: '٢',
          label: 'غير ممكن'
        }],




      };
    },
     methods: {

       getProvinces(){
         axios.get('Provinces').then(res => { this.Provinces = res.data;
         this.loadingForm = false;
         }).catch(err =>{ console.log(err);
                this.$notify({
                title: 'error',
                message: err,
                type: 'error'
                    });
               });

       },
        next() {
        if (this.active++ > 2) this.active = 0;
      },
      handleClick(tab, event) {
        console.log(tab, event);
      },
        handleChange(value) {
        console.log(value)
      },
      the_person_handicapped(){
        this.form.show_disability = 'true';
          this.$notify({
          title: 'نجاح',
          message: 'تم إظهار استمارة ذوي الإعاقة',
          type: 'success'
               });
      },



       addsearchCase(){
            this.loadingButton = true;
         var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
         const config = { headers: { 'content-type': 'multipart/form-data'}};
         if(Lang =='ar'){
          axios.post('/ar/apisearchCase',{ form: this.form ,config ,  search_registrations : this.search_registrations, disabilities : this.disabilities,image:this.attachments}).then(res => {

                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'تم ارسال دراسة الحالة بنجاح, شكراً لك',
                    showConfirmButton: false,
                    timer: 1800
                    });
                        this.loadingButton = false;
                        this.clearData();
                        }
                ).catch(err =>{ this.errors = err.response.data.errors;
                         Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            text: '.من فضلك ادخل جميع البيانات المطلوبه',
                            showConfirmButton: true,
                            timer: 2000
                            });
                            this.loadingButton = false;
                });

               }else{
                   axios.post('/en/apisearchCase',{ form: this.form , search_registrations : this.search_registrations, disabilities : this.disabilities,image:this.attachments}).then(res => {
                             Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Search Case  has been sent successfully.',
                                showConfirmButton: true,
                                timer: 2000
                                });
                             this.loadingButton = false;
                              this.clearData();

                    }).catch(err =>{ this.errors = err.response.data.errors;
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

            add (index) {                                   /* add new table search_registrations */
            this.search_registrations.push({

            });
            },
            remove (index) {                                /* remove new table search_registrations */
                this.search_registrations.splice(index, 1);
            },

      //upload Files
    processFile(event) {
         var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
            let file = event.target.files;
            // // console.log(file['1']);
            // if(!file.length){
            //     return false;
            // }
            // for(let i = 0;i<file.length;i++){
            //      let reader = new FileReader();
            //         // reader.readAsDataURL(file[i]);
            //          reader.onloadend = (event) => {
            //              console.log(reader.result);
            //              this.attachments.push(reader.result);

            //             }
            //     // this.attachments.push(file[i]);
            // }

            // console.log(file);
             var a = 1;
             var i = 0;
              let all = new Array()
              var files = new Array()
            var files =  Object.values(file).forEach(val => {
              let reader = new FileReader();
                    reader.onloadend = (event) => {
                        // var image = reader.result;
                     this.attachments.push(reader.result);
                    }
                     reader.readAsDataURL(val);
            });

        },
          //For getting Instant Uploaded Photo
        get_avatar(){
            let photo = (this.form.image.length > 100) ? this.form.image : "images/searchcase/"+ this.form.image;
            return photo;
        },

          clearData(){
            //   alert('dddds');

            this.errors = {};
            this.disabilities = false;
            this.form = {
            date: '',
            Total_number_visits: 1,
            image: '',
            styleObject: {
            width: '100px',
            height: '100px',
             },
             show_disability: 'false',
            the_person_handicapped1:'',
            the_person_handicapped2:'',
            the_person_handicapped3:'',
        },
            this.search_registrations = {};

             this.attachments = [];
             document.getElementById('upload-file').value = [];
        },
     },
     created(){
        this.getProvinces();
    }

  };
</script>


<style scoped>
.text-danger {
    color: #dc3545!important;
    font-size: 13px;
    display: block;
}
.image-live{
border-radius: 100px;
}

.el-select .el-tag__close.el-icon-close {
    background-color: #C0C4CC;
    right: 6px !important;
    top: 0;
    color: #FFF;
}


.button-submit{
   padding: 15px 40px  15px 40px !important;
}
</style>


