<template>
    <div>
        <h3 class="text-center">Add Employee Record</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addEmployee">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="employee.first_name">
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" v-model="employee.middle_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="employee.last_name">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" v-model="employee.birth_date">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" v-model="employee.gender" @change="removeEmptyOption('gender')">
                            <option value="" selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="maritalStatus">Marital Status</label>
                        <select class="form-control" id="maritalStatus" name="maritalStatus" v-model="employee.marital_status" @change="removeEmptyOption('maritalStatus')">
                            <option value="" selected>Select Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                employee: {
                    gender: '',
                    marital_status: ''
                },
            }
        },
        methods: {
            addEmployee() {
                this.axios
                    .post('http://localhost:8000/api/employee', this.employee)
                    .then(response => (
                        this.$router.push({ name: 'dashboard' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            },
            removeEmptyOption(id) {
              const selectElement = document.getElementById(id);
              if (selectElement) {
                const emptyOption = selectElement.querySelector('option[value=""]');
                if (emptyOption) {
                  selectElement.removeChild(emptyOption);
                }
              }
            }
        }
    }
</script>