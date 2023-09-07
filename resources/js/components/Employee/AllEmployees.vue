<template>
    <div>
        <h2 class="text-center">Employees List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Marital Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="employee in employees" :key="employee.id">
                <td>{{ employee.id }}</td>
                <td>{{ employee.first_name }}</td>
                <td>{{ employee.middle_name }}</td>
                <td>{{ employee.last_name }}</td>
                <td>{{ employee.birth_date }}</td>
                <td>{{ employee.gender }}</td>
                <td>{{ employee.marital_status }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-employee', params: { id: employee.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                employees: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/employee/')
                .then(response => {
                    this.employees = response.data;
                });
        },
        methods: {
            deleteEmployee(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/employee/${id}`)
                    .then(response => {
                        let i = this.employees.map(data => data.id).indexOf(id);
                        this.employees.splice(i, 1)
                    });
            }
        }
    }
</script>