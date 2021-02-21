<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Full name
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Course
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Date of Enrollment
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="x in students" :key="x.id">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{x.full_name}}
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{x.course}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{x.date_of_enrollment}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <button @click="deleteStudent(x.id)" class="btn text-indigo-600 hover:text-indigo-900">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
       <template #footer>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addStudent">Add Studdent </button>

            <!-- Modal -->
            <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Add a new Student</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                               <form id="studentForm" @submit.prevent="addStudent">
                                   <div class="form-group">
                                     <label for="full_name">Full Name</label>
                                     <input type="text" v-model="student.full_name" class="form-control" name="full_name" id="full_name" aria-describedby="helpId" placeholder="Enter your Full Name">
                                     <small id="helpId" class="form-text text-muted">Enter your First name then your Sirname</small>
                                   </div>
                                   <div class="form-group">
                                     <label for="date_of_enrollment">Enrollment Date</label>
                                     <input  v-model="student.date_of_enrollment" type="date"
                                         class="form-control" name="date_of_enrollment" id="date_of_enrollment" aria-describedby="helpId" placeholder="Select your Date">
                                     <small id="helpId" class="form-text text-muted">Date of Enrollment</small>
                                   </div>
                                   <div class="form-group">
                                     <label for="course">Course</label>
                                     <select v-model="student.course" class="form-control" name="course" id="course">
                                       <option selected disabled>Select your Course</option>
                                       <option :value="y.course_name" v-for="y in courses" :key="y.id">{{y.course_name}}</option>
                                     </select>
                                   </div>
                                   <button type="submit" class="btn btn-primary">Submit</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addCourse">Add Course </button>

            <!-- Modal -->
            <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Add a new Student</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                               <form id="courseForm" @submit.prevent="addCourse">
                                   <div class="form-group">
                                     <label for="course_name">Course Name</label>
                                     <input type="text" v-model="course.course_name" class="form-control" name="course_name" id="course_name" aria-describedby="helpId" placeholder="Enter yourCourse name">
                                     <small id="helpId" class="form-text text-muted">Enter the full name of the course</small>
                                   </div>
                                   <button type="submit" class="btn btn-primary">Submit</button>
                               </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


       </template>

    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import Welcome from './../Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        data(){
            return{
                students:[],
                student:{
                    full_name:'',
                    date_of_enrollment:'',
                    course:''
                },
                courses:[],
                course:{
                    course_name:''
                }
            }
        },
        methods:{
            async addStudent(){
                const res = await axios.post('/api/students', this.student)

                if (res.status === 201) {
                    Toast.fire({
                        icon:'success',
                        title:res.data
                    })
                    document.getElementById('studentForm').reset()
                    $("#addStudent").modal('hide')
                    Fire.$emit('addedStudent')
                }

            },
            async deleteStudent(id){
                this.$inertia.delete(`/api/students/${id}`)

                // this.$inertia.delete(`/api/students/${id}`)
            },
            async addCourse(){
                const res = await axios.post('/api/courses', this.course)

                if (res.status === 201) {
                    Toast.fire({
                        icon:'success',
                        title:res.data
                    })
                    document.getElementById('courseForm').reset()
                    $("#addCourse").modal('hide')
                    Fire.$emit('addedCourse')
                }



            },
            getStudents(){
                axios.get('/api/students')
                .then((res) => {
                    this.students = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
            getCourses(){
                axios.get('/api/courses')
                .then((res) => {
                    this.courses = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
        },
        created(){
            this.getCourses(),
            this.getStudents(),
            Fire.$on('addedCourse',()=>{
                this.getCourses()
            })
            Fire.$on('addedStudent',()=>{
                this.getStudents()
            })

        }
    }
</script>
