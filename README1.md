## Installation
	composer require ketili/fuzzydm
    
    
## Introduction

This repo is a small PHP library to make multi criteria decisions. It is depended on fuzzy-logic fundamentals and uses simple [membership](https://bit.ly/2NLJIrs) and [agregate](https://en.wikipedia.org/wiki/Aggregate_function) functions. Using this library you can make decisions based on some predefined numeric features. For example you are manager of some basketball team and you want to make profitable guard transfer for the team and you have some specific requirements: you have limited transfer budget, have some range of weight, age or height, need maximally experienced and young player as possible. This example will be discussed above alongside with library methods and functions.

 ## Example
 
Let's imagine that we have following list of guards with their characteristics:
![]({img/guards.png)

**1. Age**

You said you need an young player doesn't you? So what is a aproximately good age for being young and also experienced a little bit? I think 24, 25 or 26... or some age nearer those numbers. Let's make membership function to express your requirement. Would be better if we use trapezoid membership function which actually looks like: ![]({{site.baseurl}}/img/agef.png)

where a, b, c and d are numeric parameters, indicating corners of trapezoid-shaped graph. If we take a, b, c and d consecutively 18, 24, 26, 35 we would get graph like that: 
![]({{site.baseurl}}/img/age.png)

it means that ideal option for us is age between [24, 26] where function returns 1. Also return value decreasing  when argument approaches to 18 and 35 as shown on graph. It means that you don't need 18 year old player who doesn't have any experience, also you don't need older than 35, it is too old for your team. For example this function estimates 30 old player as 0.55

![](https://latex.codecogs.com/gif.latex?%5Clarge%20f%2830%3B%2018%2C%2024%2C%2026%2C%2035%29%20%3D%200.55)






**2.Years in NBA**

Here we use _triangular membership function_ ![]({{site.baseurl}}/img/years.png)

where a, b and c are numeric params indicating corners of triangle-shaped graph: 

![]({{site.baseurl}}/img/nba_years.png)


in this graph **a = 0, b = 5, c = 13** and it means that your favorite option would be player with 5 years of NBA experience.  



**3. Cost**

You just have 20 million dollars and you want to not waste all your money but also you don't need to buy cheap player, because in trademarket cost means player efficiency. So let's use **triangular function again with parameters a = 0, b = 13 and c = 20**

![]({{site.baseurl}}/img/cost.png)



**4.Height**

Of course point guards are not too tall because they should be quick, could move ball fast da have good dribbling skills. There is snippet from wikipedia:

> In the NBA, point guards are usually about 6' 3" (1.93 m) or shorter, and average about 6' 2" (1.88 m) whereas in the WNBA, point guards are usually 5' 9" (1.75 m) or shorter. Having above-average size (height, muscle) is considered advantageous, although size is secondary to situational awareness, speed, quickness, and ball handling skills.

Lets take **triangular** again, **a = 160, b = 188, c = 205**

![]({{site.baseurl}}/img/height.png)


**5. Assists per game (APG)**

Here we choose some non fundamental, **custom membership function** which has horizontal asymptote on y=1

![]({{site.baseurl}}/img/assists.png)

this means that function has value 0 at point x = 1 and it increases monotonously by increasing **x** and never becomes equal to 1 because function has asympote **y = 1**. Here is a formula of this graph:

![](https://latex.codecogs.com/gif.latex?%5Clarge%20f%28x%29%20%3D%20%5Cfrac%7Bx-1%7D%7Bx-0.2%7D)


**6. Three point percentage (3P%)**

We should take same type of function here but with different parameters:

![](https://latex.codecogs.com/gif.latex?%5Clarge%20f%28x%29%20%3D%20%5Cfrac%7Bx-20%7D%7Bx-19%7D)



![]({{site.baseurl}}/img/tpp.png)




## Aggregation

Lets calculate values of membership functions for example for **JJ Barea**:

![](https://latex.codecogs.com/gif.latex?%5Clarge%20age%2833%29%20%3D%200.22)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20height%28182%29%20%3D%200.78)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20tpp%2835.4%29%20%3D%200.94)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20apg%283.9%29%20%3D%200.78)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20years%2811%29%20%3D%200.25)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20cost%289.2%29%20%3D%200.71)

so we have evaluations for each characteritic of player and we need to aggregate them into single evaluation. Here is many [aggregate functions](https://en.wikipedia.org/wiki/Aggregate_function), but for simplicity we can just use most famous aggregate function - [Arithmetic Mean](https://en.wikipedia.org/wiki/Arithmetic_mean)
![](https://wikimedia.org/api/rest_v1/media/math/render/svg/90330653b40adf032ea8e144f84d7eec1a88054d)

So aggregated evaluation of **JJ Barea** would be:

![](https://latex.codecogs.com/gif.latex?A%20%3D%20%5Cfrac%7B1%7D%7B6%7D%280.22%20&plus;%200.78%20&plus;%200.94%20&plus;%200.78%20&plus;%200.25%20&plus;%200.71%29%20%3D%200.613)

and full table of evaluations looks like that: 

![]({{site.baseurl}}/img/results.png)

## Implementation


## Feedbacks and Pull Requests

Any kind of pull requests will be acceptable. 

**note:**  _There are few amount of membership and aggregate functions and I think most desirable pull requests would be about them_

## C# version of this Repo:

[https://github.com/goodot/fuzzy-decision-maker](https://github.com/goodot/fuzzy-decision-maker)

(not finished yet)
