import { Component, OnInit } from "@angular/core";

@Component({
  selector: "app-courses",
  templateUrl: "./courses.page.html",
  styleUrls: ["./courses.page.scss"]
})
export class CoursesPage implements OnInit {
  currentSegment: any = "coet";

  coetCourses = [
    
      {image: "assets/imgs/dot.PNG", courseName: "PE 285 Electrical Networks", isChacked: false},
      {image: "assets/imgs/dot.PNG", courseName: "EE 181  Networks", isChacked: false},
      {image: "assets/imgs/dot.PNG", courseName: "KE 281 Computer ", isChacked: false},
      {image: "assets/imgs/dot.PNG", courseName: "IE 381 Comp....works", isChacked: false},

  ];

  coictCourses = [
    
    {image: "assets/imgs/dot.PNG", courseName: "IS 281 Computer Networks", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 271  Networks", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 261 Computer ", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 287 Comp....works", isChacked: false},
    
    {image: "assets/imgs/dot.PNG", courseName: "IS 291 Networks Administration", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 282 Software Development II", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 200 Artchtecure ", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 223 Comp....works", isChacked: false},

    {image: "assets/imgs/dot.PNG", courseName: "IS 281 Computer Networks", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 281  Networks", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 281 Computer ", isChacked: false},
    {image: "assets/imgs/dot.PNG", courseName: "IS 281 Comp....works", isChacked: false},


];

conasCourses = [
    
  {image: "assets/imgs/dot.PNG", courseName: "GY 200 Computer Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "GY 281  Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "EV 200 Computer ", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "GY 181 Comp....works", isChacked: false},

];

cohuCourses = [
    
  {image: "assets/imgs/dot.PNG", courseName: "WR 281 Computer Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "IS 281  Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "FG 281 Computer ", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "TT 281 Comp....works", isChacked: false},

];

udbsCourses = [
    
  {image: "assets/imgs/dot.PNG", courseName: "EC 281 Computer Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "EC 201  Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "BK 281 Computer ", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "IS 281 Comp....works", isChacked: false},

];

soedCourses = [
    
  {image: "assets/imgs/dot.PNG", courseName: "CT 140 Computer Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "TC 201  Networks", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "EV 100 Computer ", isChacked: false},
  {image: "assets/imgs/dot.PNG", courseName: "KI 181 Comp....works", isChacked: false},

];
  

  constructor() {}

  ngOnInit() {}

  segmentChanged(ev: any) {
    this.currentSegment = ev.detail.value;
    console.log("segment changed", ev.detail.value);
  }

  checkedCourse(ev: any, index) {
    console.log("is checked", index);

    for (let i = 0; i < this.coetCourses.length; i++) {
      if (index != i) {
        console.log('good')
        this.coetCourses[i].isChacked = false;
      }
    }
  }
}
