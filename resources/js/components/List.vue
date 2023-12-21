<template>
  <div>
    <h1>All data list</h1>
    <hr />
    <!-- v-for="list in data":key="list" -->
    <!-- v-for="(listdata1.index) in listdata" :key="index" -->
    {{ listdata }}
    <table>
      <tr>
        <th scope="col">NAME</th>
        <hr />
        <th scope="col">ID</th>
        <hr />
        <th scope="col">email</th>
        <hr />
      </tr>
      <tbody>
        <tr v-for="listdata in data" :key="id">
          <td>{{ listdata.name }}</td>
          <hr />
          <td>{{ listdata.id }}</td>
          <hr />
          <td>{{ listdata.email }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props: ["data"],
};
</script>
