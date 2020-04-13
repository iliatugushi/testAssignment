<template>
  <div>
    <el-col :gutter="24">
      <el-col :span="20">
        <el-input placeholder="Please input search keyword" v-model="searchKeyword"></el-input>
      </el-col>
      <el-col :span="4">
        <el-button type="primary" @click="searchDatabase(searchKeyword)">Search</el-button>
      </el-col>
    </el-col>

    <br />
    <br />
    <br />

    <el-table
      :data="tableData"
      style="width: 100%"
      v-loading="loading"
      element-loading-text="Loading..."
      element-loading-spinner="el-icon-loading"
      v-if="showTable"
    >
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
      loading: true,
      searchKeyword: "",
      tableData: []
    };
  },
  methods: {
    searchDatabase: function(searchKeyword) {
      this.loading = true;
      this.showTable = false;
      this.tableData = [];

      axios
        .post("api/search-simple", { keyword: searchKeyword })
        .then(response => {
          this.tableData = response.data.properties;
          this.loading = false;
          this.showTable = true;
        });
    }
  }
};
</script>

