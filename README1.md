## Installation
	composer require ketili/fuzzydm
    
    
## Introduction

This repo is a small PHP library to make multi criteria decisions. It is depended on fuzzy-logic fundamentals and uses simple [membership](https://bit.ly/2NLJIrs) and [agregate](https://en.wikipedia.org/wiki/Aggregate_function) functions without any mathematical library. Using this library you can make decisions based on some predefined numeric features. For example you are manager of some basketball team and you want to make profitable guard transfer for the team and you have some specific requirements: you have limited transfer budget, have some range of weight, age or height, need maximally experienced and young player as possible. This example will be discussed above alongside with library methods and functions.

 ## Example
 
Let's imagine that we have following list of guards with their characteristics:
![](https://lh3.googleusercontent.com/mxvVsKY35Qau9klI80DeRKGdXyzTUi7VOhdYiD5BL_yA7r_SRQwzUDxomgvexKVx5ZcMI6GaYjgCwJtK-COX7CTHIkV5QC5EElsIpXXlrhuqisRTu7R_SKOvZa9wP3tmX8SFlZY-VIyW1olanBc50e0zcU3lpelDaJodCh4RxnQP35THt0ucHFiM35ovkCjkj05GLea8BbIoWT4jQUrT7uvvuyPnX06omY_hCWt0lX7gG4VktS8-h_8jdTjbD_upUUXyUNk2ZeuLSuVi6Ax7Bio5EqgoRuLNgIkTHPmp0fgWwBwWqMEdOXUtwr2f3dqn3U-cdDtPrhjVoP_mtqY4Fuw246WB_kL-0WclEAhDtyp5iwO6SPmKkQh5m3T97BLdzmas_HKsHVy4-N0RvJ_jWCOTvr1EP7VsbZ_O51glldMz2Hpgy51_u8BF2WLpysfDYIyB0ztcX5H7FHfx1M4aaiAITcoN2Y3AymEE9vrXU9Sk7RlFKtsZY2nyfUf520j7aT5LCquKxvQGk8x1OkOe00NxTLkaS2lvvWSBKSgqTQG2EfG9gr9VURJ0uf0I-RpQkAIsTvem7bt9XA0hXkSj6aLJrFLCbISyYtYK0zY=w660-h529-no)

we have some key criterias, let's assume that best desirable age of our guard is in range [24,26], so for age if we take rectangular membership function will not be bad: 

![](https://lh3.googleusercontent.com/M07hoNA4Dorj5B4TLCI6pOj8eyLEYjgtHEWrabqr3RvCBx1v759VhbA4u1203Waff2kO3PeYznEZSUfY6MwkdOQnm5-b4vc5ZPRBp_PfBuwSR08G5M8RPnKSwfwkV0CCM4AwDmfK0wUfGhXhvfozSkJ0RL9itiEVAhbucSqH4VfTD7ZX-hAtd71LLNk1vgKuoEnuMKyUJZxgG4QoIUunlw0fCEA_24LCmnrqf1X71jJNQsH2bSsSqbZsCNNZ_JompwR5Zs4V940Ef8SYuULonXGJhK_8LDIcRAtbV1PBoH7xl2C51CV9at_bokKO3D9uoc81Z2GkCeHYj-Re0P9978IU8jmncrTqwpNWv2RRvNytGyrV22hCaUzjMbN-rMkbONLa-AA56d4Qk184WmePmDuepFaL35_SjaJRyvb_0_M2g_oinTw-mMjg92J0SVKlJ_XYrHJJKJa6DIM7OdYbRthkuTKCJWarFEehHg2oPmUHmv4jb8qKmXV0-blXH61bgYJJGIfBRP6nUwBj1VWcTi3PPLnZV0hmPRPKKL0YmhSG1kjH62N3_LSh7b7kXMqmYTY0aiS7CYP79gSLKAZlzEGFqg9j_b0AuNjLh-4=w640-h480-no)

it means that this function returns it's maximal value (1) in range [24, 26].

Also we just have 20 million dollars and we want to not waste all your money but also you don't need to buy cheap player, because in trademarket cost means player efficiency. Let's take there triangular function like that: 
![](https://lh3.googleusercontent.com/4KmPAJMpUjW0oBrNieXh3R0JKVGu2JC56bsgkqjjC_fJwrQt1V2g92f1BTvLz9ye10ATYS7GnpvcwTBP5NtVljBt38J-y-etsTz-dYQxQWmBmWqZRmZ4E9IwSEHATlEHy3OXeG32cBtrxhuNlVKnXCxgxXm-jA9TO0MTau50oBSinfzlI4vW3dpJPrrqrOWkGZDAVCbaXjpcZJT7Fh9KRc2FwiasBX7sNd0laFEG4M9IkqbeQj1ZloF2I0S3iekPcUs61F8LzxBNiKAAFoJiyiy03Q-_WvSX2i8CBWnCqlP-bUFrZSocCvquoe6cjYWLffEpFYW77MDWHjYxAQ6sYEQ1mRidTSfSgXr85xTVuMQbxzN3s1nUoF1lXvpQhBdowFs4_Cbf0-s0cv2e78xAM6eE_1nl9Ch0HaeXemyAaQkWPw-BA-3NW2Qp8gaCCpw304_WoAhHWNokXr2TfuFUm_JTZDmnK5QVTl_feh6qA9W-ww-9px6ptgbe9sonESuVw4xuBRRDGU7Usf2mTbldA4QdEnHOQGTbpIda9YJfgOZt0jsxOlkjEVOdLY4HgOzXondFMn78OBTY-GYmPtkJ31OkjPz7kiK7xqBtUz0=w640-h480-no)

## Feedbacks and Pull Requests

Any kind of pull requests will be acceptable. 

**note:**  _There are few amount of membership and aggregate functions and I think most desirable pull requests would be about them_

## C# version of this Repo:

[https://github.com/goodot/fuzzy-decision-maker](https://github.com/goodot/fuzzy-decision-maker)

(not finished yet)
