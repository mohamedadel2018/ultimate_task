(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_projects_projectsCreate_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/projects/projectsCreate.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/projects/projectsCreate.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      search: '',
      editProjectVisible: false,
      structureCount: {},
      allProjects: [],
      loadingupdate: false,
      toggletable: true,
      addprojectVisible: false,
      loadingButton: false,
      addTaskVisible: false,
      addprojectForm: {},
      addtaskForm: {},
      editTaskVisible: false,
      TasksForm: {},
      errors: {},
      links: [],
      state: '',
      Provinces: '',
      user_Permissions: ''
    };
  },
  methods: {
    showdialogProject: function showdialogProject() {
      this.addprojectVisible = true;
    },
    showdialogTask: function showdialogTask() {
      this.addTaskVisible = true;
    },
    addproject: function addproject() {
      var _this = this;

      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
      this.loadingButton = true;

      if (Lang == 'ar') {
        axios.post("/ar/apiprojects", {
          addprojectForm: this.addprojectForm
        }).then(function (res) {
          _this.addprojectVisible = false;
          _this.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'تم إنشاء المشروع بنجاح, شكراً لك',
            showConfirmButton: false,
            timer: 1800
          });

          _this.clearData();

          _this.getProjectsAfterAdd();
        })["catch"](function (err) {
          _this.errors = err.response.data.errors;
          _this.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            text: '.من فضلك ادخل جميع البيانات المطلوبه',
            showConfirmButton: true,
            timer: 2000
          });
        });
      } else {
        axios.post("/en/apiprojects", {
          addprojectForm: this.addprojectForm
        }).then(function (res) {
          _this.addprojectVisible = false;
          _this.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Project has been Created successfully.',
            showConfirmButton: true,
            timer: 2000
          });

          _this.clearData();

          _this.getProjectsAfterAdd();
        })["catch"](function (err) {
          _this.errors = err.response.data.errors;
          _this.loadingButton = false;
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
    editproject: function editproject(row) {
      this.editProjectVisible = true;
      this.addprojectForm = row;
    },
    updateProject: function updateProject(row) {
      var _this2 = this;

      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

      if (Lang == 'ar') {
        axios.put("/ar/apiprojects/".concat(row), this.addprojectForm).then(function (res) {
          _this2.editProjectVisible = false;
          _this2.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'تم تعديل المشروع بنجاح, شكراً لك',
            showConfirmButton: false,
            timer: 1800
          }); // this.clearData();
        })["catch"](function (err) {
          _this2.errors = err.response.data.errors;
          _this2.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            text: '.من فضلك ادخل جميع البيانات المطلوبه',
            showConfirmButton: true,
            timer: 2000
          });
        });
      } else {
        axios.put("/en/apiprojects/".concat(row), this.addprojectForm).then(function (res) {
          _this2.editProjectVisible = false;
          _this2.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Project has been updated successfully.',
            showConfirmButton: true,
            timer: 2000
          });
        })["catch"](function (err) {
          _this2.errors = err.response.data.errors;
          _this2.loadingButton = false;
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
    addtask: function addtask(projectId) {
      var _this3 = this;

      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");
      this.loadingButton = true;

      if (Lang == 'ar') {
        axios.post("/ar/apitasks", {
          addtaskForm: this.addtaskForm,
          projectId: projectId
        }).then(function (res) {
          _this3.addTaskVisible = false;
          _this3.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'تم إنشاء المهمة بنجاح, شكراً لك',
            showConfirmButton: false,
            timer: 1800
          });

          _this3.clearData();

          _this3.getProjectsAfterAdd();
        })["catch"](function (err) {
          _this3.errors = err.response.data.errors;
          _this3.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            text: '.من فضلك ادخل جميع البيانات المطلوبه',
            showConfirmButton: true,
            timer: 2000
          });
        });
      } else {
        axios.post("/en/apitasks", {
          addtaskForm: this.addtaskForm,
          projectId: projectId
        }).then(function (res) {
          _this3.addTaskVisible = false;
          _this3.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Task has been Created successfully.',
            showConfirmButton: true,
            timer: 2000
          });

          _this3.clearData();

          _this3.getProjectsAfterAdd();
        })["catch"](function (err) {
          _this3.errors = err.response.data.errors;
          _this3.loadingButton = false;
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
    edittask: function edittask(row) {
      this.editTaskVisible = true;
      this.addtaskForm = row;
    },
    updateTask: function updateTask(row) {
      var _this4 = this;

      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

      if (Lang == 'ar') {
        axios.put("/ar/apitasks/".concat(row), this.addtaskForm).then(function (res) {
          _this4.editProjectVisible = false;
          _this4.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'تم تعديل المهمة بنجاح, شكراً لك',
            timer: 1800
          }); // this.clearData();

          _this4.editTaskVisible = false;
          _this4.addtaskForm = {};
        })["catch"](function (err) {
          _this4.errors = err.response.data.errors;
          _this4.loadingButton = false;
          _this4.editTaskVisible = false, Swal.fire({
            position: 'top-end',
            icon: 'error',
            text: '.من فضلك ادخل جميع البيانات المطلوبه',
            timer: 2000
          });
        });
      } else {
        axios.put("/ar/apitasks/".concat(row), this.addtaskForm).then(function (res) {
          _this4.editProjectVisible = false;
          _this4.loadingButton = false;
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Task has been updated successfully.',
            timer: 2000
          });
          _this4.editTaskVisible = false;
          _this4.addtaskForm = {};
        })["catch"](function (err) {
          _this4.errors = err.response.data.errors;
          _this4.loadingButton = false;
          _this4.editTaskVisible = false;
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
    handleDeleteTask: function handleDeleteTask(row) {
      var _this5 = this;

      console.log(row);
      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

      if (Lang == 'ar') {
        this.$confirm('هل انت متاكد من رغبتك في حذف المشروع', 'تنبيه', {
          confirmButtonText: 'حذف',
          cancelButtonText: 'الغاء',
          type: ''
        }).then(function () {
          axios["delete"]("/ar/apitasks/".concat(row.id)).then(function (res) {
            _this5.$notify({
              title: 'نجاح',
              message: 'تم حذف المهمة بنجاح',
              type: 'success'
            });

            _this5.getProjects();

            _this5.handleShow();
          })["catch"](function (err) {
            return console.log(err);
          });
        })["catch"](function () {
          _this5.$message({
            type: 'info',
            message: 'تم الغاء الحذف  '
          });
        });
      } else {
        this.$confirm('Are you Sure You Wand Delete this Task', 'Warning', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(function () {
          axios["delete"]("/en/apitasks/".concat(row.id)).then(function (res) {
            _this5.$notify({
              title: 'Success',
              message: 'Task Deleted Successfully',
              type: 'success'
            });

            _this5.getProjects();
          })["catch"](function (err) {
            return console.log(err);
          });
        })["catch"](function () {
          _this5.$message({
            type: 'info',
            message: 'Delete canceled'
          });
        });
      }
    },
    handleShow: function handleShow(index, row) {
      this.toggletable = false;
      this.TasksForm = row;
      console.log(index, row);
    },
    handleDelete: function handleDelete(index, row) {
      var _this6 = this;

      console.log(index, row);
      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

      if (Lang == 'ar') {
        this.$confirm('هل انت متاكد من رغبتك في حذف المشروع', 'تنبيه', {
          confirmButtonText: 'حذف',
          cancelButtonText: 'الغاء',
          type: ''
        }).then(function () {
          axios["delete"]("/ar/apiprojects/".concat(row.id)).then(function (res) {
            _this6.$notify({
              title: 'نجاح',
              message: 'تم حذف المشروع بنجاح',
              type: 'success'
            });

            _this6.getProjects();
          })["catch"](function (err) {
            return console.log(err);
          });
        })["catch"](function () {
          _this6.$message({
            type: 'info',
            message: 'تم الغاء الحذف  '
          });
        });
      } else {
        this.$confirm('Are you Sure You Wand Delete this project', 'Warning', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(function () {
          axios["delete"]("/en/apiprojects/".concat(row.id)).then(function (res) {
            _this6.$notify({
              title: 'Success',
              message: 'project Deleted Successfully',
              type: 'success'
            });

            _this6.getProjects();
          })["catch"](function (err) {
            return console.log(err);
          });
        })["catch"](function () {
          _this6.$message({
            type: 'info',
            message: 'Delete canceled'
          });
        });
      }
    },
    getProjectsAfterAdd: function getProjectsAfterAdd() {
      var _this7 = this;

      axios.get('/ar/apiprojects').then(function (res) {
        _this7.allProjects = res.data;
        console.log(_this7.allProjects);
      })["catch"](function (err) {
        console.log(err);
      });
    },
    getProjects: function getProjects() {
      var _this8 = this;

      this.loadingupdate = true;
      axios.get('/ar/apiprojects').then(function (res) {
        _this8.allProjects = res.data;
        _this8.loadingupdate = false;
        console.log(_this8.allProjects);
      })["catch"](function (err) {
        console.log(err);
      });
    },
    getResults: function getResults() {
      var _this9 = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      axios.get('/ar/apiprojects?page=' + page).then(function (response) {
        _this9.allProjects = response.data; //  console.log('dd',response.data);
      });
    },
    querySearch: function querySearch(queryString, cb) {
      var links = this.links;
      var results = queryString ? links.filter(this.createFilter(queryString)) : links; // call callback function to return suggestion objects

      cb(results);
    },
    createFilter: function createFilter(queryString) {
      return function (link) {
        return link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0;
      };
    },
    loadAll: function loadAll() {
      return [{
        "value": "كل المحافظات"
      }, {
        "value": "القاهرة"
      }, {
        "value": "الإسكندرية"
      }, {
        "value": "بورسعيد"
      }, {
        "value": "الأقصر"
      }, {
        "value": "قنا"
      }, {
        "value": "سوهاج"
      }, {
        "value": "الجيزة"
      }, {
        "value": "الدقهلية"
      }, {
        "value": "دمياط"
      }, {
        "value": "كفر الشيخ"
      }, {
        "value": "السويس"
      }, {
        "value": "الغربية"
      }, {
        "value": "الفيوم"
      }, {
        "value": "المنوفية"
      }, {
        "value": "مطروح"
      }, {
        "value": "الوادي الجديد"
      }, {
        "value": "المنيا"
      }, {
        "value": "أسوان"
      }, {
        "value": "البحيرة"
      }, {
        "value": "بني سويف"
      }, {
        "value": "الإسماعيلية"
      }, {
        "value": "أسيوط"
      }, {
        "value": "شمال سيناء"
      }, {
        "value": "جنوب سيناء"
      }, {
        "value": "البحر الأحمر"
      }];
    },
    handleSelectProvinces: function handleSelectProvinces(item) {
      var _this10 = this;

      // console.log(item.value);
      axios.post('searchProvinces', {
        'Provinces': item.value
      }).then(function (res) {
        _this10.allfiltehCase = res.data;
      })["catch"](function (err) {
        return _this10.errors = err.response.data.errors;
      });
    },
    handleClose: function handleClose(done) {
      var _this11 = this;

      var Lang = document.getElementsByTagName("html")[0].getAttribute("lang");

      if (Lang == 'ar') {
        this.$confirm('هل انت متاكد من الاغلاق؟').then(function (_) {
          done();
        })["catch"](function (_) {});
      } else {
        this.$confirm('Are you sure to close this dialog?').then(function (_) {
          done();
          _this11.addtaskForm = {};
        })["catch"](function (_) {});
      }
    },
    userPermissions: function userPermissions() {
      var _this12 = this;

      axios.get('userPermissions').then(function (res) {
        _this12.user_Permissions = res.data;
        console.log('userPermissions', _this12.user_Permissions);
      })["catch"](function (err) {
        console.log(err);
      });
    },
    getProvinces: function getProvinces() {
      var _this13 = this;

      axios.get('Provinces').then(function (res) {
        _this13.Provinces = res.data;
        console.log(res.data);
      })["catch"](function (err) {
        console.log(err);
      });
    },
    clearData: function clearData() {
      //   alert('dddds');
      this.addtaskForm = {};
      this.errors = {};
      this.addprojectForm = {};
    }
  },
  created: function created() {
    this.getProjects();
    this.getProvinces();
    this.userPermissions();
  }
});

/***/ }),

/***/ "./resources/js/components/projects/projectsCreate.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/projects/projectsCreate.vue ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _projectsCreate_vue_vue_type_template_id_4c6e1b60___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./projectsCreate.vue?vue&type=template&id=4c6e1b60& */ "./resources/js/components/projects/projectsCreate.vue?vue&type=template&id=4c6e1b60&");
/* harmony import */ var _projectsCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./projectsCreate.vue?vue&type=script&lang=js& */ "./resources/js/components/projects/projectsCreate.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _projectsCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _projectsCreate_vue_vue_type_template_id_4c6e1b60___WEBPACK_IMPORTED_MODULE_0__.render,
  _projectsCreate_vue_vue_type_template_id_4c6e1b60___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/projects/projectsCreate.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/projects/projectsCreate.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/projects/projectsCreate.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_projectsCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./projectsCreate.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/projects/projectsCreate.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_projectsCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/projects/projectsCreate.vue?vue&type=template&id=4c6e1b60&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/projects/projectsCreate.vue?vue&type=template&id=4c6e1b60& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_projectsCreate_vue_vue_type_template_id_4c6e1b60___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_projectsCreate_vue_vue_type_template_id_4c6e1b60___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_projectsCreate_vue_vue_type_template_id_4c6e1b60___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./projectsCreate.vue?vue&type=template&id=4c6e1b60& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/projects/projectsCreate.vue?vue&type=template&id=4c6e1b60&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/projects/projectsCreate.vue?vue&type=template&id=4c6e1b60&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/projects/projectsCreate.vue?vue&type=template&id=4c6e1b60& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("section", { staticClass: "content" }, [
      _c("div", { staticClass: "container-fluid" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "card card-purple" }, [
              _c("div", { staticClass: "card-header row" }, [
                _c("div", { staticClass: "col-md-8" }, [
                  _c(
                    "h3",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.toggletable == true,
                          expression: "toggletable == true"
                        }
                      ],
                      staticClass: "card-title-rtl"
                    },
                    [_vm._v("  " + _vm._s(_vm.$trans("app.projects")))]
                  ),
                  _vm._v(" "),
                  _c(
                    "h3",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.toggletable == false,
                          expression: "toggletable == false"
                        }
                      ],
                      staticClass: "card-title-rtl"
                    },
                    [_vm._v("  " + _vm._s(_vm.$trans("app.tasks")))]
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-2" }, [
                  _c(
                    "span",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.toggletable == false,
                          expression: "toggletable == false"
                        }
                      ]
                    },
                    [
                      _vm._v(
                        _vm._s(_vm.$trans("app.Code")) +
                          ":  " +
                          _vm._s(_vm.allProjects.id) +
                          " "
                      )
                    ]
                  )
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-md-2 " },
                  [
                    _c("el-button", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.toggletable == false,
                          expression: "toggletable == false"
                        }
                      ],
                      staticClass: "text-sm ",
                      attrs: {
                        type: "primary",
                        size: "small",
                        title: _vm.$trans("app.back"),
                        icon: "el-icon-back",
                        plain: ""
                      },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          _vm.toggletable = true
                        }
                      }
                    })
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "card-body" },
                [
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-md-2" },
                      [
                        _c(
                          "el-button",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: _vm.toggletable == true,
                                expression: "toggletable == true"
                              }
                            ],
                            attrs: { type: "primary", round: "" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.showdialogProject()
                              }
                            }
                          },
                          [
                            _c("i", { staticClass: "fas fa-plus" }),
                            _vm._v(" " + _vm._s(_vm.$trans("app.add")))
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "el-dialog",
                          {
                            attrs: {
                              title: _vm.$trans("app.add_projects"),
                              visible: _vm.addprojectVisible,
                              width: "50%",
                              "before-close": _vm.handleClose,
                              center: ""
                            },
                            on: {
                              "update:visible": function($event) {
                                _vm.addprojectVisible = $event
                              }
                            }
                          },
                          [
                            _c(
                              "span",
                              [
                                _c(
                                  "el-form",
                                  {
                                    attrs: { "label-width": "20%" },
                                    on: {
                                      submit: function($event) {
                                        $event.preventDefault()
                                        return _vm.addproject.apply(
                                          null,
                                          arguments
                                        )
                                      }
                                    }
                                  },
                                  [
                                    _c(
                                      "el-form-item",
                                      [
                                        _c("label", { attrs: { for: "" } }, [
                                          _vm._v(
                                            _vm._s(_vm.$trans("app.name")) + " "
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("el-input", {
                                          attrs: {
                                            placeholder: _vm.$trans("app.name")
                                          },
                                          model: {
                                            value: _vm.addprojectForm.name,
                                            callback: function($$v) {
                                              _vm.$set(
                                                _vm.addprojectForm,
                                                "name",
                                                $$v
                                              )
                                            },
                                            expression: "addprojectForm.name"
                                          }
                                        }),
                                        _vm._v(" "),
                                        _vm.errors["addprojectForm.name"]
                                          ? _c(
                                              "span",
                                              { staticClass: "text-danger" },
                                              [
                                                _vm._v(
                                                  "\n                                                    " +
                                                    _vm._s(
                                                      _vm.errors[
                                                        "addprojectForm.name"
                                                      ][0]
                                                    ) +
                                                    "\n                                                "
                                                )
                                              ]
                                            )
                                          : _vm._e()
                                      ],
                                      1
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "el-form-item",
                                      [
                                        _c("label", { attrs: { for: "" } }, [
                                          _vm._v(
                                            _vm._s(
                                              _vm.$trans("app.description")
                                            ) + " "
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("el-input", {
                                          attrs: {
                                            type: "textarea",
                                            placeholder: _vm.$trans(
                                              "app.description"
                                            )
                                          },
                                          model: {
                                            value:
                                              _vm.addprojectForm.description,
                                            callback: function($$v) {
                                              _vm.$set(
                                                _vm.addprojectForm,
                                                "description",
                                                $$v
                                              )
                                            },
                                            expression:
                                              "addprojectForm.description"
                                          }
                                        }),
                                        _vm._v(" "),
                                        _vm.errors["addprojectForm.description"]
                                          ? _c(
                                              "span",
                                              { staticClass: "text-danger" },
                                              [
                                                _vm._v(
                                                  "\n                                                    " +
                                                    _vm._s(
                                                      _vm.errors[
                                                        "addprojectForm.description"
                                                      ][0]
                                                    ) +
                                                    "\n                                                "
                                                )
                                              ]
                                            )
                                          : _vm._e()
                                      ],
                                      1
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "el-form-item",
                                      [
                                        _c("label", { attrs: { for: "" } }, [
                                          _vm._v(
                                            _vm._s(_vm.$trans("app.location")) +
                                              " "
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("br"),
                                        _vm._v(" "),
                                        _c(
                                          "el-select",
                                          {
                                            attrs: {
                                              placeholder: _vm.$trans(
                                                "app.location"
                                              )
                                            },
                                            model: {
                                              value:
                                                _vm.addprojectForm.location,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.addprojectForm,
                                                  "location",
                                                  $$v
                                                )
                                              },
                                              expression:
                                                "addprojectForm.location"
                                            }
                                          },
                                          _vm._l(
                                            _vm.Provinces.Provinces,
                                            function(Province) {
                                              return _c("el-option", {
                                                key: Province.id,
                                                attrs: {
                                                  label: Province.name,
                                                  value: Province.name
                                                }
                                              })
                                            }
                                          ),
                                          1
                                        ),
                                        _vm._v(" "),
                                        _vm.errors["addprojectForm.location"]
                                          ? _c(
                                              "span",
                                              { staticClass: "text-danger" },
                                              [
                                                _vm._v(
                                                  "\n                                                        " +
                                                    _vm._s(
                                                      _vm.errors[
                                                        "addprojectForm.location"
                                                      ][0]
                                                    ) +
                                                    "\n                                                    "
                                                )
                                              ]
                                            )
                                          : _vm._e()
                                      ],
                                      1
                                    )
                                  ],
                                  1
                                )
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "span",
                              {
                                staticClass: "dialog-footer",
                                attrs: { slot: "footer" },
                                slot: "footer"
                              },
                              [
                                _c(
                                  "el-button",
                                  {
                                    on: {
                                      click: function($event) {
                                        _vm.addprojectVisible = false
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(_vm.$trans("app.cancel")))]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { type: "primary" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.addproject()
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(_vm.$trans("app.add")))]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "col-md-6 d-flex justify-content-end mb-2"
                      },
                      [
                        _c(
                          "el-button",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: _vm.toggletable == true,
                                expression: "toggletable == true"
                              }
                            ],
                            staticClass: "mt-2 ",
                            attrs: {
                              type: "primary",
                              size: "mini",
                              round: "",
                              loading: _vm.loadingupdate,
                              icon: "el-icon-refresh"
                            },
                            on: {
                              click: function($event) {
                                return _vm.getProjects()
                              }
                            }
                          },
                          [_vm._v(" " + _vm._s(_vm.$trans("app.redevelop")))]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c(
                    "el-table",
                    {
                      directives: [
                        {
                          name: "loading",
                          rawName: "v-loading",
                          value: _vm.loadingupdate,
                          expression: "loadingupdate"
                        },
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.toggletable == true,
                          expression: "toggletable == true"
                        }
                      ],
                      staticStyle: { width: "100%" },
                      attrs: {
                        data: _vm.allProjects.data.filter(function(data) {
                          return (
                            !_vm.search ||
                            data.family_name
                              .toLowerCase()
                              .includes(_vm.search.toLowerCase())
                          )
                        }),
                        fit: "",
                        height: "500"
                      }
                    },
                    [
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.number"),
                          type: "index",
                          width: "50",
                          align: "center"
                        }
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.name"),
                          prop: "name",
                          align: "center"
                        }
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.description"),
                          prop: "description",
                          align: "center"
                        },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                _vm._v(
                                  "\n                                     " +
                                    _vm._s(
                                      _vm._f("str_limit")(scope.row.description)
                                    ) +
                                    "\n                                    "
                                )
                              ]
                            }
                          }
                        ])
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.location"),
                          prop: "location",
                          align: "center"
                        }
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.created_by"),
                          prop: "created_by",
                          align: "center"
                        }
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.date"),
                          prop: "created_at",
                          align: "center"
                        },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                _vm._v(
                                  "\n                                     " +
                                    _vm._s(
                                      _vm._f("timeFormat")(scope.row.created_at)
                                    ) +
                                    "\n                                    "
                                )
                              ]
                            }
                          }
                        ])
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: {
                          label: _vm.$trans("app.tasks"),
                          prop: "created_at",
                          align: "center"
                        },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "small" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.handleShow(
                                          scope.$index,
                                          scope.row
                                        )
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(_vm.$trans("app.show")))]
                                )
                              ]
                            }
                          }
                        ])
                      }),
                      _vm._v(" "),
                      _c("el-table-column", {
                        attrs: { align: "right" },
                        scopedSlots: _vm._u([
                          {
                            key: "header",
                            fn: function(scope) {
                              return [
                                _c("el-input", {
                                  attrs: { placeholder: "Type to search" },
                                  model: {
                                    value: _vm.search,
                                    callback: function($$v) {
                                      _vm.search = $$v
                                    },
                                    expression: "search"
                                  }
                                }),
                                _vm._v(
                                  "\n                 " +
                                    _vm._s(scope.row) +
                                    "\n                "
                                )
                              ]
                            }
                          },
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                _c(
                                  "el-button",
                                  {
                                    directives: [
                                      {
                                        name: "show",
                                        rawName: "v-show",
                                        value:
                                          _vm.user_Permissions.project_update ==
                                          true,
                                        expression:
                                          "user_Permissions.project_update == true"
                                      }
                                    ],
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.editproject(scope.row)
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(_vm.$trans("app.edit")))]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    directives: [
                                      {
                                        name: "show",
                                        rawName: "v-show",
                                        value:
                                          _vm.user_Permissions.project_update !=
                                          true,
                                        expression:
                                          "user_Permissions.project_update != true"
                                      }
                                    ],
                                    attrs: { size: "mini", disabled: "" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.editproject(scope.row)
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(_vm.$trans("app.edit")))]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-dialog",
                                  {
                                    attrs: {
                                      title: "Edit Catigory",
                                      visible: _vm.editProjectVisible,
                                      width: "50%",
                                      "before-close": _vm.handleClose,
                                      center: ""
                                    },
                                    on: {
                                      "update:visible": function($event) {
                                        _vm.editProjectVisible = $event
                                      }
                                    }
                                  },
                                  [
                                    _c(
                                      "span",
                                      [
                                        _c(
                                          "el-form",
                                          {
                                            attrs: { "label-width": "20%" },
                                            on: {
                                              submit: function($event) {
                                                $event.preventDefault()
                                                return _vm.editproject.apply(
                                                  null,
                                                  arguments
                                                )
                                              }
                                            }
                                          },
                                          [
                                            _c(
                                              "el-form-item",
                                              [
                                                _c(
                                                  "label",
                                                  { attrs: { for: "" } },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$trans("app.name")
                                                      ) + " "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("el-input", {
                                                  attrs: {
                                                    placeholder: _vm.$trans(
                                                      "app.name"
                                                    )
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addprojectForm.name,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addprojectForm,
                                                        "name",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addprojectForm.name"
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _vm.errors["name"]
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "text-danger"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                                                    " +
                                                            _vm._s(
                                                              _vm.errors[
                                                                "name"
                                                              ][0]
                                                            ) +
                                                            "\n                                                "
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e()
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "el-form-item",
                                              [
                                                _c(
                                                  "label",
                                                  { attrs: { for: "" } },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$trans(
                                                          "app.description"
                                                        )
                                                      ) + " "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("el-input", {
                                                  attrs: {
                                                    type: "textarea",
                                                    placeholder: _vm.$trans(
                                                      "app.description"
                                                    )
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addprojectForm
                                                        .description,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addprojectForm,
                                                        "description",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addprojectForm.description"
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _vm.errors["description"]
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "text-danger"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                                                    " +
                                                            _vm._s(
                                                              _vm.errors[
                                                                "description"
                                                              ][0]
                                                            ) +
                                                            "\n                                                "
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e()
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "el-form-item",
                                              [
                                                _c(
                                                  "label",
                                                  { attrs: { for: "" } },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$trans(
                                                          "app.location"
                                                        )
                                                      ) + " "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("br"),
                                                _vm._v(" "),
                                                _c(
                                                  "el-select",
                                                  {
                                                    attrs: {
                                                      placeholder: _vm.$trans(
                                                        "app.location"
                                                      )
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.addprojectForm
                                                          .location,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.addprojectForm,
                                                          "location",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "addprojectForm.location"
                                                    }
                                                  },
                                                  _vm._l(
                                                    _vm.Provinces.Provinces,
                                                    function(Province) {
                                                      return _c("el-option", {
                                                        key: Province.id,
                                                        attrs: {
                                                          label: Province.name,
                                                          value: Province.name
                                                        }
                                                      })
                                                    }
                                                  ),
                                                  1
                                                ),
                                                _vm._v(" "),
                                                _vm.errors["location"]
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "text-danger"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                                                        " +
                                                            _vm._s(
                                                              _vm.errors[
                                                                "location"
                                                              ][0]
                                                            ) +
                                                            "\n                                                    "
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e()
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "el-form-item",
                                              [
                                                _c(
                                                  "label",
                                                  { attrs: { for: "" } },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$trans(
                                                          "app.created_by"
                                                        )
                                                      ) + " "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("br"),
                                                _vm._v(" "),
                                                _c(
                                                  "el-select",
                                                  {
                                                    attrs: {
                                                      placeholder: "اسم الباحث"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.addprojectForm
                                                          .created_by,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.addprojectForm,
                                                          "created_by",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "addprojectForm.created_by"
                                                    }
                                                  },
                                                  _vm._l(
                                                    _vm.Provinces.users,
                                                    function(user) {
                                                      return _c(
                                                        "el-option",
                                                        {
                                                          key: user.id,
                                                          attrs: {
                                                            label:
                                                              user.first_name +
                                                              " " +
                                                              user.last_name,
                                                            value: user.id
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                        " +
                                                              _vm._s(
                                                                user.first_name
                                                              ) +
                                                              " " +
                                                              _vm._s(
                                                                user.last_name
                                                              ) +
                                                              "\n                                                        "
                                                          )
                                                        ]
                                                      )
                                                    }
                                                  ),
                                                  1
                                                )
                                              ],
                                              1
                                            )
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      {
                                        staticClass: "dialog-footer",
                                        attrs: { slot: "footer" },
                                        slot: "footer"
                                      },
                                      [
                                        _c(
                                          "el-button",
                                          {
                                            on: {
                                              click: function($event) {
                                                _vm.editProjectVisible = false
                                              }
                                            }
                                          },
                                          [
                                            _vm._v(
                                              _vm._s(_vm.$trans("app.cancel"))
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "el-button",
                                          {
                                            attrs: { type: "primary" },
                                            on: {
                                              click: function($event) {
                                                $event.preventDefault()
                                                return _vm.updateProject(
                                                  _vm.addprojectForm.id
                                                )
                                              }
                                            }
                                          },
                                          [
                                            _vm._v(
                                              _vm._s(_vm.$trans("app.submit"))
                                            )
                                          ]
                                        )
                                      ],
                                      1
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    directives: [
                                      {
                                        name: "show",
                                        rawName: "v-show",
                                        value:
                                          _vm.user_Permissions.project_delete ==
                                          true,
                                        expression:
                                          "user_Permissions.project_delete == true"
                                      }
                                    ],
                                    attrs: { size: "small", type: "danger" },
                                    on: {
                                      click: function($event) {
                                        return _vm.handleDelete(
                                          scope.$index,
                                          scope.row
                                        )
                                      }
                                    }
                                  },
                                  [_c("i", { staticClass: "el-icon-delete" })]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    directives: [
                                      {
                                        name: "show",
                                        rawName: "v-show",
                                        value:
                                          _vm.user_Permissions.project_delete !=
                                          true,
                                        expression:
                                          "user_Permissions.project_delete != true"
                                      }
                                    ],
                                    attrs: {
                                      size: "small",
                                      type: "danger",
                                      disabled: ""
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.handleDelete(
                                          scope.$index,
                                          scope.row
                                        )
                                      }
                                    }
                                  },
                                  [_c("i", { staticClass: "el-icon-delete" })]
                                )
                              ]
                            }
                          }
                        ])
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "ul",
                    { staticClass: "mb-4 mt-4 text-xs" },
                    [
                      _c(
                        "pagination",
                        {
                          attrs: {
                            data: _vm.allProjects,
                            limit: 1,
                            "show-disabled": true
                          },
                          on: { "pagination-change-page": _vm.getResults }
                        },
                        [
                          _c(
                            "span",
                            { attrs: { slot: "prev-nav" }, slot: "prev-nav" },
                            [_vm._v("< Previous")]
                          ),
                          _vm._v(" "),
                          _c(
                            "span",
                            { attrs: { slot: "next-nav" }, slot: "next-nav" },
                            [_vm._v("Next >")]
                          )
                        ]
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "el-card",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.toggletable == false,
                          expression: "toggletable == false"
                        }
                      ],
                      staticClass: "box-card"
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: { slot: "header" },
                          slot: "header"
                        },
                        [
                          _c("div", { staticClass: "col-md-6" }, [
                            _c("span", [_vm._v(_vm._s(_vm.TasksForm.name))])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-2" }, [
                            _c(
                              "span",
                              {
                                staticClass:
                                  "badge rounded-pill bg-warning text-dark"
                              },
                              [
                                _vm._v(
                                  " " +
                                    _vm._s(_vm.$trans("app.Created_By")) +
                                    ":  "
                                ),
                                _c("span", [
                                  _vm._v(_vm._s(_vm.TasksForm.created_by))
                                ])
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-2" }, [
                            _c(
                              "span",
                              {
                                staticClass: "badge rounded-pill bg-secondary"
                              },
                              [
                                _c("span", [
                                  _vm._v(
                                    _vm._s(
                                      _vm._f("timeFormat")(
                                        _vm.TasksForm.created_at
                                      )
                                    )
                                  )
                                ])
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-md-2" },
                            [
                              _c(
                                "el-button",
                                {
                                  directives: [
                                    {
                                      name: "show",
                                      rawName: "v-show",
                                      value: _vm.toggletable == false,
                                      expression: "toggletable == false"
                                    }
                                  ],
                                  attrs: {
                                    size: "small",
                                    type: "primary",
                                    round: ""
                                  },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.showdialogTask()
                                    }
                                  }
                                },
                                [
                                  _c("i", { staticClass: "fas fa-plus" }),
                                  _vm._v(
                                    " " + _vm._s(_vm.$trans("app.add_task"))
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "el-dialog",
                                {
                                  attrs: {
                                    title: _vm.$trans("app.add_task"),
                                    visible: _vm.addTaskVisible,
                                    width: "50%",
                                    "before-close": _vm.handleClose,
                                    center: ""
                                  },
                                  on: {
                                    "update:visible": function($event) {
                                      _vm.addTaskVisible = $event
                                    }
                                  }
                                },
                                [
                                  _c(
                                    "span",
                                    [
                                      _c(
                                        "el-form",
                                        {
                                          attrs: { "label-width": "20%" },
                                          on: {
                                            submit: function($event) {
                                              $event.preventDefault()
                                              return _vm.addTask.apply(
                                                null,
                                                arguments
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "el-form-item",
                                            [
                                              _c(
                                                "label",
                                                { attrs: { for: "" } },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.name")
                                                    ) + " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("el-input", {
                                                attrs: {
                                                  placeholder: _vm.$trans(
                                                    "app.name"
                                                  )
                                                },
                                                model: {
                                                  value: _vm.addtaskForm.name,
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.addtaskForm,
                                                      "name",
                                                      $$v
                                                    )
                                                  },
                                                  expression: "addtaskForm.name"
                                                }
                                              }),
                                              _vm._v(" "),
                                              _vm.errors["name"]
                                                ? _c(
                                                    "span",
                                                    {
                                                      staticClass: "text-danger"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    " +
                                                          _vm._s(
                                                            _vm.errors[
                                                              "name"
                                                            ][0]
                                                          ) +
                                                          "\n                                                "
                                                      )
                                                    ]
                                                  )
                                                : _vm._e()
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "el-form-item",
                                            [
                                              _c(
                                                "label",
                                                { attrs: { for: "" } },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.task")
                                                    ) + " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("el-input", {
                                                attrs: {
                                                  type: "textarea",
                                                  placeholder: _vm.$trans(
                                                    "app.task"
                                                  )
                                                },
                                                model: {
                                                  value:
                                                    _vm.addtaskForm.description,
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.addtaskForm,
                                                      "description",
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "addtaskForm.description"
                                                }
                                              }),
                                              _vm._v(" "),
                                              _vm.errors["description"]
                                                ? _c(
                                                    "span",
                                                    {
                                                      staticClass: "text-danger"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    " +
                                                          _vm._s(
                                                            _vm.errors[
                                                              "description"
                                                            ][0]
                                                          ) +
                                                          "\n                                                "
                                                      )
                                                    ]
                                                  )
                                                : _vm._e()
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "el-form-item",
                                            [
                                              _c(
                                                "label",
                                                { attrs: { for: "" } },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.status")
                                                    ) + " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("br"),
                                              _vm._v(" "),
                                              _c(
                                                "el-radio",
                                                {
                                                  attrs: {
                                                    value: "1",
                                                    label: "1"
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addtaskForm.status,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addtaskForm,
                                                        "status",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addtaskForm.status"
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " " +
                                                      _vm._s(
                                                        _vm.$trans("app.done")
                                                      ) +
                                                      " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "el-radio",
                                                {
                                                  attrs: {
                                                    value: "2",
                                                    label: "2"
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addtaskForm.status,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addtaskForm,
                                                        "status",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addtaskForm.status"
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " " +
                                                      _vm._s(
                                                        _vm.$trans(
                                                          "app.not_done"
                                                        )
                                                      ) +
                                                      " "
                                                  )
                                                ]
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "el-form-item",
                                            [
                                              _c(
                                                "label",
                                                { attrs: { for: "" } },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.urgency")
                                                    ) + " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("br"),
                                              _vm._v(" "),
                                              _c(
                                                "el-radio",
                                                {
                                                  attrs: {
                                                    value: "1",
                                                    label: "1"
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addtaskForm.urgency,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addtaskForm,
                                                        "urgency",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addtaskForm.urgency"
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " " +
                                                      _vm._s(
                                                        _vm.$trans(
                                                          "app.important"
                                                        )
                                                      ) +
                                                      " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "el-radio",
                                                {
                                                  attrs: {
                                                    value: "2",
                                                    label: "2"
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addtaskForm.urgency,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addtaskForm,
                                                        "urgency",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addtaskForm.urgency"
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " " +
                                                      _vm._s(
                                                        _vm.$trans(
                                                          "app.less_important"
                                                        )
                                                      ) +
                                                      " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "el-radio",
                                                {
                                                  attrs: {
                                                    value: "3",
                                                    label: "3"
                                                  },
                                                  model: {
                                                    value:
                                                      _vm.addtaskForm.urgency,
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        _vm.addtaskForm,
                                                        "urgency",
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "addtaskForm.urgency"
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " " +
                                                      _vm._s(
                                                        _vm.$trans("app.normal")
                                                      ) +
                                                      " "
                                                  )
                                                ]
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "el-form-item",
                                            [
                                              _c(
                                                "label",
                                                { attrs: { for: "" } },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.date")
                                                    ) + " "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("br"),
                                              _vm._v(" "),
                                              _c("el-date-picker", {
                                                attrs: {
                                                  "value-format": "yyyy-MM-dd",
                                                  type: "date",
                                                  format: "yyyy-MM-dd",
                                                  placeholder: "ادخل التاريخ"
                                                },
                                                model: {
                                                  value: _vm.addtaskForm.date,
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.addtaskForm,
                                                      "date",
                                                      $$v
                                                    )
                                                  },
                                                  expression: "addtaskForm.date"
                                                }
                                              })
                                            ],
                                            1
                                          )
                                        ],
                                        1
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "span",
                                    {
                                      staticClass: "dialog-footer",
                                      attrs: { slot: "footer" },
                                      slot: "footer"
                                    },
                                    [
                                      _c(
                                        "el-button",
                                        {
                                          on: {
                                            click: function($event) {
                                              _vm.addTaskVisible = false
                                            }
                                          }
                                        },
                                        [
                                          _vm._v(
                                            _vm._s(_vm.$trans("app.cancel"))
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "el-button",
                                        {
                                          attrs: { type: "primary" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.addtask(
                                                _vm.TasksForm.id
                                              )
                                            }
                                          }
                                        },
                                        [_vm._v(_vm._s(_vm.$trans("app.add")))]
                                      )
                                    ],
                                    1
                                  )
                                ]
                              )
                            ],
                            1
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _vm._l(_vm.TasksForm.tasks, function(task) {
                        return _c(
                          "el-collapse",
                          { key: task.id, staticClass: "mt-2" },
                          [
                            _c(
                              "el-collapse-item",
                              { attrs: { name: task.id } },
                              [
                                _c(
                                  "template",
                                  { staticClass: "text-lg", slot: "title" },
                                  [
                                    _vm._v(
                                      "\n                                            " +
                                        _vm._s(task.name) +
                                        "\n                                        "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "row" }, [
                                  _c("div", { staticClass: "col-md-10" }),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "col-md-2" },
                                    [
                                      _c(
                                        "el-button",
                                        {
                                          attrs: { size: "mini" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.edittask(task)
                                            }
                                          }
                                        },
                                        [_vm._v(_vm._s(_vm.$trans("app.edit")))]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "el-button",
                                        {
                                          attrs: {
                                            size: "small",
                                            type: "danger"
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.handleDeleteTask(task)
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "el-icon-delete"
                                          })
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "el-dialog",
                                        {
                                          attrs: {
                                            title: _vm.$trans("app.add_task"),
                                            visible: _vm.editTaskVisible,
                                            width: "50%",
                                            "before-close": _vm.handleClose,
                                            center: ""
                                          },
                                          on: {
                                            "update:visible": function($event) {
                                              _vm.editTaskVisible = $event
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "span",
                                            [
                                              _c(
                                                "el-form",
                                                {
                                                  attrs: {
                                                    "label-width": "20%"
                                                  },
                                                  on: {
                                                    submit: function($event) {
                                                      $event.preventDefault()
                                                      return _vm.addTask.apply(
                                                        null,
                                                        arguments
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "el-form-item",
                                                    [
                                                      _c(
                                                        "label",
                                                        { attrs: { for: "" } },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              _vm.$trans(
                                                                "app.name"
                                                              )
                                                            ) + " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c("el-input", {
                                                        attrs: {
                                                          placeholder: _vm.$trans(
                                                            "app.name"
                                                          )
                                                        },
                                                        model: {
                                                          value:
                                                            _vm.addtaskForm
                                                              .name,
                                                          callback: function(
                                                            $$v
                                                          ) {
                                                            _vm.$set(
                                                              _vm.addtaskForm,
                                                              "name",
                                                              $$v
                                                            )
                                                          },
                                                          expression:
                                                            "addtaskForm.name"
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _vm.errors["name"]
                                                        ? _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text-danger"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                    " +
                                                                  _vm._s(
                                                                    _vm.errors[
                                                                      "name"
                                                                    ][0]
                                                                  ) +
                                                                  "\n                                                "
                                                              )
                                                            ]
                                                          )
                                                        : _vm._e()
                                                    ],
                                                    1
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "el-form-item",
                                                    [
                                                      _c(
                                                        "label",
                                                        { attrs: { for: "" } },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              _vm.$trans(
                                                                "app.task"
                                                              )
                                                            ) + " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c("el-input", {
                                                        attrs: {
                                                          type: "textarea",
                                                          placeholder: _vm.$trans(
                                                            "app.task"
                                                          )
                                                        },
                                                        model: {
                                                          value:
                                                            _vm.addtaskForm
                                                              .description,
                                                          callback: function(
                                                            $$v
                                                          ) {
                                                            _vm.$set(
                                                              _vm.addtaskForm,
                                                              "description",
                                                              $$v
                                                            )
                                                          },
                                                          expression:
                                                            "addtaskForm.description"
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _vm.errors["description"]
                                                        ? _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text-danger"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                    " +
                                                                  _vm._s(
                                                                    _vm.errors[
                                                                      "description"
                                                                    ][0]
                                                                  ) +
                                                                  "\n                                                "
                                                              )
                                                            ]
                                                          )
                                                        : _vm._e()
                                                    ],
                                                    1
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "el-form-item",
                                                    [
                                                      _c(
                                                        "label",
                                                        { attrs: { for: "" } },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              _vm.$trans(
                                                                "app.status"
                                                              )
                                                            ) + " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c("br"),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-radio",
                                                        {
                                                          attrs: {
                                                            value: "1",
                                                            label: "1"
                                                          },
                                                          model: {
                                                            value:
                                                              _vm.addtaskForm
                                                                .status,
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.$set(
                                                                _vm.addtaskForm,
                                                                "status",
                                                                $$v
                                                              )
                                                            },
                                                            expression:
                                                              "addtaskForm.status"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            " " +
                                                              _vm._s(
                                                                _vm.$trans(
                                                                  "app.done"
                                                                )
                                                              ) +
                                                              " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-radio",
                                                        {
                                                          attrs: {
                                                            value: "2",
                                                            label: "2"
                                                          },
                                                          model: {
                                                            value:
                                                              _vm.addtaskForm
                                                                .status,
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.$set(
                                                                _vm.addtaskForm,
                                                                "status",
                                                                $$v
                                                              )
                                                            },
                                                            expression:
                                                              "addtaskForm.status"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            " " +
                                                              _vm._s(
                                                                _vm.$trans(
                                                                  "app.not_done"
                                                                )
                                                              ) +
                                                              " "
                                                          )
                                                        ]
                                                      )
                                                    ],
                                                    1
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "el-form-item",
                                                    [
                                                      _c(
                                                        "label",
                                                        { attrs: { for: "" } },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              _vm.$trans(
                                                                "app.urgency"
                                                              )
                                                            ) + " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c("br"),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-radio",
                                                        {
                                                          attrs: {
                                                            value: "1",
                                                            label: "1"
                                                          },
                                                          model: {
                                                            value:
                                                              _vm.addtaskForm
                                                                .urgency,
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.$set(
                                                                _vm.addtaskForm,
                                                                "urgency",
                                                                $$v
                                                              )
                                                            },
                                                            expression:
                                                              "addtaskForm.urgency"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            " " +
                                                              _vm._s(
                                                                _vm.$trans(
                                                                  "app.important"
                                                                )
                                                              ) +
                                                              " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-radio",
                                                        {
                                                          attrs: {
                                                            value: "2",
                                                            label: "2"
                                                          },
                                                          model: {
                                                            value:
                                                              _vm.addtaskForm
                                                                .urgency,
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.$set(
                                                                _vm.addtaskForm,
                                                                "urgency",
                                                                $$v
                                                              )
                                                            },
                                                            expression:
                                                              "addtaskForm.urgency"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            " " +
                                                              _vm._s(
                                                                _vm.$trans(
                                                                  "app.less_important"
                                                                )
                                                              ) +
                                                              " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-radio",
                                                        {
                                                          attrs: {
                                                            value: "3",
                                                            label: "3"
                                                          },
                                                          model: {
                                                            value:
                                                              _vm.addtaskForm
                                                                .urgency,
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.$set(
                                                                _vm.addtaskForm,
                                                                "urgency",
                                                                $$v
                                                              )
                                                            },
                                                            expression:
                                                              "addtaskForm.urgency"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            " " +
                                                              _vm._s(
                                                                _vm.$trans(
                                                                  "app.normal"
                                                                )
                                                              ) +
                                                              " "
                                                          )
                                                        ]
                                                      )
                                                    ],
                                                    1
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "el-form-item",
                                                    [
                                                      _c(
                                                        "label",
                                                        { attrs: { for: "" } },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              _vm.$trans(
                                                                "app.date"
                                                              )
                                                            ) + " "
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c("br"),
                                                      _vm._v(" "),
                                                      _c("el-date-picker", {
                                                        attrs: {
                                                          "value-format":
                                                            "yyyy-MM-dd",
                                                          type: "date",
                                                          format: "yyyy-MM-dd",
                                                          placeholder:
                                                            "ادخل التاريخ"
                                                        },
                                                        model: {
                                                          value:
                                                            _vm.addtaskForm
                                                              .date,
                                                          callback: function(
                                                            $$v
                                                          ) {
                                                            _vm.$set(
                                                              _vm.addtaskForm,
                                                              "date",
                                                              $$v
                                                            )
                                                          },
                                                          expression:
                                                            "addtaskForm.date"
                                                        }
                                                      })
                                                    ],
                                                    1
                                                  )
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              staticClass: "dialog-footer",
                                              attrs: { slot: "footer" },
                                              slot: "footer"
                                            },
                                            [
                                              _c(
                                                "el-button",
                                                {
                                                  on: {
                                                    click: function($event) {
                                                      _vm.editTaskVisible = false
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.cancel")
                                                    )
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "el-button",
                                                {
                                                  attrs: { type: "primary" },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      return _vm.updateTask(
                                                        _vm.TasksForm.id
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.$trans("app.add")
                                                    )
                                                  )
                                                ]
                                              )
                                            ],
                                            1
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  )
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "row" }, [
                                  _c(
                                    "div",
                                    { staticClass: "col-md-6 text-md" },
                                    [
                                      _vm._v(
                                        "\n                                             " +
                                          _vm._s(_vm.$trans("app.task")) +
                                          " : " +
                                          _vm._s(task.description) +
                                          "\n                                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "col-md-2 text-center" },
                                    [
                                      _vm._v(
                                        "\n                                              " +
                                          _vm._s(_vm.$trans("app.date")) +
                                          ": " +
                                          _vm._s(task.dueDate) +
                                          "\n                                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "col-md-2 text-center" },
                                    [
                                      _vm._v(
                                        "\n                                              " +
                                          _vm._s(_vm.$trans("app.status")) +
                                          ":\n                                              "
                                      ),
                                      _c(
                                        "span",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value: task.status == 1,
                                              expression: "task.status == 1"
                                            }
                                          ]
                                        },
                                        [
                                          _vm._v(
                                            "  " +
                                              _vm._s(_vm.$trans("app.done"))
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "span",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value: task.status == 2,
                                              expression: "task.status == 2"
                                            }
                                          ]
                                        },
                                        [
                                          _vm._v(
                                            "  " +
                                              _vm._s(_vm.$trans("app.not_done"))
                                          )
                                        ]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "col-md-2 text-center" },
                                    [
                                      _vm._v(
                                        "\n                                              " +
                                          _vm._s(_vm.$trans("app.urgency")) +
                                          ":\n                                                "
                                      ),
                                      _c(
                                        "span",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value: task.urgency == 1,
                                              expression: "task.urgency == 1"
                                            }
                                          ],
                                          staticClass:
                                            "badge rounded-pill bg-danger"
                                        },
                                        [
                                          _vm._v(
                                            "  " +
                                              _vm._s(
                                                _vm.$trans("app.important")
                                              )
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "span",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value: task.urgency == 2,
                                              expression: "task.urgency == 2"
                                            }
                                          ],
                                          staticClass:
                                            "badge rounded-pill bg-warning text-dark"
                                        },
                                        [
                                          _vm._v(
                                            "  " +
                                              _vm._s(
                                                _vm.$trans("app.less_important")
                                              )
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "span",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value: task.urgency == 3,
                                              expression: "task.urgency == 3"
                                            }
                                          ],
                                          staticClass:
                                            "badge rounded-pill bg-info text-dark"
                                        },
                                        [
                                          _vm._v(
                                            "  " +
                                              _vm._s(_vm.$trans("app.normal"))
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              ],
                              2
                            )
                          ],
                          1
                        )
                      })
                    ],
                    2
                  )
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("hr")
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);