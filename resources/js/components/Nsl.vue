<template>
  <div>
    <h1>All information list</h1>
    <hr />
    <!-- <Nsl :tab /> -->
    <Nsl :data="info" />
    {{ data }}
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
        <tr>
          <td></td>
          <hr />
          <td></td>
          <hr />
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props: ["data"],
  name: "Nsl",
  //   components: { Nsl },
  data() {
    return {
      info: [
        {
          name: "shehab",
          id: "1",
          email: "shehab@gmail.com",
        },
        {
          name: "mehedi",
          id: "2",
          email: "mehedi@gmail.com",
        },
        {
          name: "rimi",
          id: "3",
          email: "rimi@gmail.com",
        },
        {
          name: "mouly",
          id: "4",
          email: "mouly@gmail.com",
        },
      ],
    };
  },
};
</script>
