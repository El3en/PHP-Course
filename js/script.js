let display = function (greeting) {
  console.log(this);
  console.log(`${greeting}`);
  console.log(`First Name: ${this.firstName}`);
  console.log(`Last Name: ${this.lastName}`);
  console.log(`Score: ${this.score}`);
  console.log(`Email: ${this.email}`);
};

let students = [
  {
    firstName: "Ohoud",
    lastName: "Ahmed",
    email: "example@gmail.com",
    score: 95,
  },
  {
    firstName: "Mohammed",
    lastName: "Salem",
    email: "Mohammed@gmail.com",
    score: 90,
    display: display,
  },
  {
    firstName: "Khalid",
    lastName: "Abdulla",
    email: "Khalid@hotmail.com",
    score: 85,
  },
  {
    firstName: "Reem",
    lastName: "Ali",
    email: "Reem@hotmail.com",
    score: 93,
  },
];

students[1].display('Hi');
display.call(students[0],'Hi')
display.apply(students[0],['Hi']);
display = display.bind(students[0],'Hi');
display();