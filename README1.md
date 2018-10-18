## Installation
	composer require ketili/fuzzydm
    
    
## Introduction

This repo is a small PHP library to make multi criteria decisions. It is depended on fuzzy-logic fundamentals and uses simple [membership](https://bit.ly/2NLJIrs) and [agregate](https://en.wikipedia.org/wiki/Aggregate_function) functions without any mathematical library. Using this library you can make decisions based on some predefined numeric features. For example you are manager of some basketball team and you want to make profitable guard transfer for the team and you have some specific requirements: you have limited transfer budget, have some range of weight, age or height, need maximally experienced and young player as possible. This example will be discussed above alongside with library methods and functions.

 ## Example
 
Let's imagine that we have following list of guards with their characteristics:
![](https://lh3.googleusercontent.com/mxvVsKY35Qau9klI80DeRKGdXyzTUi7VOhdYiD5BL_yA7r_SRQwzUDxomgvexKVx5ZcMI6GaYjgCwJtK-COX7CTHIkV5QC5EElsIpXXlrhuqisRTu7R_SKOvZa9wP3tmX8SFlZY-VIyW1olanBc50e0zcU3lpelDaJodCh4RxnQP35THt0ucHFiM35ovkCjkj05GLea8BbIoWT4jQUrT7uvvuyPnX06omY_hCWt0lX7gG4VktS8-h_8jdTjbD_upUUXyUNk2ZeuLSuVi6Ax7Bio5EqgoRuLNgIkTHPmp0fgWwBwWqMEdOXUtwr2f3dqn3U-cdDtPrhjVoP_mtqY4Fuw246WB_kL-0WclEAhDtyp5iwO6SPmKkQh5m3T97BLdzmas_HKsHVy4-N0RvJ_jWCOTvr1EP7VsbZ_O51glldMz2Hpgy51_u8BF2WLpysfDYIyB0ztcX5H7FHfx1M4aaiAITcoN2Y3AymEE9vrXU9Sk7RlFKtsZY2nyfUf520j7aT5LCquKxvQGk8x1OkOe00NxTLkaS2lvvWSBKSgqTQG2EfG9gr9VURJ0uf0I-RpQkAIsTvem7bt9XA0hXkSj6aLJrFLCbISyYtYK0zY=w660-h529-no)

we have some key criterias, let's assume that best desirable age of our guard is in range [24,26], so for age if we take rectangular membership function will not be bad: 

![](https://lh3.googleusercontent.com/k4UbxhiXKEn2xpl6ZDsD8jL5ZQyMYogXnBh3B10fp6FyaRqgJ9rDxZYub5LdUy5BifbLqPYMLHh-WLwhNI-b7NWMKJKA-NIlxBNRc_SJlD_dqnY1s0ZHZOnjvkpMGUevm1RVSj5yyAKdgB1OcChUHWkriVn-OCXdfFE2ZEd-_pjYE6m1ow788Ec6Zd2TWQ9ONHfmWgVDJilvHoh13VkmTZasIcRGQzkAW3EhdI_wRBgfnXW5XQAq0Nku_gHlNyJt_jwKOEE1FF6wpYAnuf8qDrqNPuUO4z4eRdQPEsQXoejFt7x9vzW5YPDE_Auv55rwwm0ucO46KvAh8MzSfO_7aD6Zax_6J5FOhPVy13P3ZYf6z08Ran5YvmQME9rBfJcmEj7YtHJ3x71Eo2R35JMBeOKI9SR-9yEAzq34sfmpon76ZDcOwU2E0Q7UB5XMpUyIOdFGRq9Eu_ZpOdMcDYqgR_kRvwozRGZPVfMRVhyBl7AYSmyrauYZXvwyzay4kqvABKGpd74TCUuoN2XGNmIEXnn8roFe0yvN8JIzlWt9Er4OI-NElv-LHXvmr6jnAe9EhY7J-xrKcmnQ1k3jclEVigcTsfBtiQeJQfp4ZSY=w258-h143-no)

it means that this function returns it's maximal value (1) in range [24, 26].

Also we just have 20 million dollars and we want to not waste all your money but also you don't need to buy cheap player, because in trademarket cost means player efficiency. So there will be good to use triangular function again 

## Feedbacks and Pull Requests

Any kind of pull requests will be acceptable. 

**note:**  _There are few amount of membership and aggregate functions and I think most desirable pull requests would be about them_

## C# version of this Repo:

[https://github.com/goodot/fuzzy-decision-maker](https://github.com/goodot/fuzzy-decision-maker)

(not finished yet)
