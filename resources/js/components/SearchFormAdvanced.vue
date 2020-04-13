<template>
  <div>
    <el-col :gutter="20">
      <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="Name">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="Bedrooms">
          <el-input v-model="form.bedrooms"></el-input>
        </el-form-item>
        <el-form-item label="Bathrooms">
          <el-input v-model="form.bathrooms"></el-input>
        </el-form-item>
        <el-form-item label="Storeys">
          <el-input v-model="form.storeys"></el-input>
        </el-form-item>
        <el-form-item label="Garages">
          <el-input v-model="form.garages"></el-input>
        </el-form-item>
        <el-form-item label="Price From">
          <el-input v-model="form.x"></el-input>
        </el-form-item>
        <el-form-item label="Price To">
          <el-input v-model="form.y"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="searchDatabase()">Search</el-button>
        </el-form-item>
      </el-form>
    </el-col>

    <br />

    <el-table :data="tableData" style="width: 100%" v-loading="loading" v-if="showTable">
      <div slot="empty">No Results Found</div>
      <el-table-column prop="name" label="Name"></el-table-column>
      <el-table-column prop="price" label="Price"></el-table-column>
      <el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
      <el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
      <el-table-column prop="storeys" label="Storeys"></el-table-column>
      <el-table-column prop="garages" label="Garages"></el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  mounted() {},
  data: function() {
    return {
      showTable: false,
      loading: false,
      tableData: [],
      form: {
        name: "",
        bedrooms: "",
        bathrooms: "",
        storeys: "",
        garages: "",
        x: "",
        y: ""
      }
    };
  },
  methods: {
    searchDatabase: function() {
      this.loading = true;
      this.showTable = false;
      this.tableData = [];

      axios
        .post("api/search-advanced", {
          name: this.form.name,
          bedrooms: this.form.bedrooms,
          bathrooms: this.form.bathrooms,
          storeys: this.form.storeys,
          garages: this.form.garages,
          x: this.form.x,
          y: this.form.y
        })
        .then(response => {
          this.tableData = response.data.properties;
          this.loading = false;
          this.showTable = true;
        });
    }
  }
};
</script>

