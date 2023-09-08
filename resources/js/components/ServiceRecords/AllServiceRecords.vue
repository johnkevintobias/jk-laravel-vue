<template>
    <div>
        <h2 class="text-center">Service Records List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>Record ID</th>
                <th>Employee</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="service_record in service_records" :key="service_record.id">
                <td>{{ service_record.id }}</td>
                <td>{{ '(#'+service_record.employee_id+') '+service_record.employee.first_name+' '+service_record.employee.last_name }}</td>
                <td>{{ formatDate(service_record.date_from) }}</td>
                <td>{{ formatDate(service_record.date_to) }}</td>
                <td>{{ service_record.position }}</td>
                <td>{{ service_record.salary }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-service-record', params: { id: service_record.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteServiceRecord(service_record.id)">Delete</button>
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
                service_records: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/service-record/')
                .then(response => {
                    this.service_records = response.data;
                });
        },
        methods: {
            deleteServiceRecord(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/service-record/${id}`)
                    .then(response => {
                        let i = this.service_records.map(data => data.id).indexOf(id);
                        this.service_records.splice(i, 1)
                    });
            },
            formatDate(dateString) {
              const date = new Date(dateString);
              return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
              });
            }
        }
    }
</script>