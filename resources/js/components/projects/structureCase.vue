 <template>
<div>


      <section class="content" >
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-purple">
                      <div class="card-header">
                            <h3 class="card-title-rtl"> {{ $trans('app.counts') }}</h3>
                      </div>

                      <div class="card-body">

                            <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{structureCount.projects_count}}</h3>

                <h5> {{ $trans('app.projects') }}</h5>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
              <a href="/projects" class="small-box-footer"> {{ $trans('app.more_info') }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


             <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{structureCount.tasks_count}}</h3>

                <h5> {{ $trans('app.tasks') }}</h5>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
              <a href="/projects" class="small-box-footer"> {{ $trans('app.more_info') }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{structureCount.supervisors_count}}</h3>

               <h5>{{ $trans('app.supervisors_count') }}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/users" class="small-box-footer">{{ $trans('app.more_info') }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
        </div>

                      </div>
                       </div>
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
       structureCount:{},

      }
    },
    methods: {

      getstructureCounts(){
          axios.get('structureCounts').then(res => { this.structureCount = res.data ; console.log(this.structureCount);}).catch(err => console.log(err));
      },

    },
    created(){
       this.getstructureCounts();
    }
  }
</script>

