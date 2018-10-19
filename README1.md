## Installation
	composer require ketili/fuzzydm
    
    
## Introduction

This repo is a small PHP library to make multi criteria decisions. It is depended on fuzzy-logic fundamentals and uses simple [membership](https://bit.ly/2NLJIrs) and [agregate](https://en.wikipedia.org/wiki/Aggregate_function) functions without any mathematical library. Using this library you can make decisions based on some predefined numeric features. For example you are manager of some basketball team and you want to make profitable guard transfer for the team and you have some specific requirements: you have limited transfer budget, have some range of weight, age or height, need maximally experienced and young player as possible. This example will be discussed above alongside with library methods and functions.

 ## Example
 
Let's imagine that we have following list of guards with their characteristics:![](https://lh3.googleusercontent.com/1xZ38CfuR4-2e2U5EMrh_LFSFYHgutnrD8YQv9OyHJFmzVoAdBM8pdOkKXLMcqASdZYuJDiqLqo2TIYRdgYqDxqCRFytPbAfeW9PljAAIYcHX66DZ9dZIRFiRZnX77gK4IpPvOnPopNKqxONEe4MCxKMVhCQopd61G-0oJfByy3D8zNn-6UB4Leunz_wcSOudn0eNYTpbDKs2NcGbJ3-nT-5nqVo9CgFIBNlQaqy_xiPyCc-O6EyUwZsqhJQ71Usokv3hoHTbCbjgHVmEFzbFRZRH2PLGOD89XxU_QHkO8pjXMxlLve0ya7yPlYX-GwXeIwUF7EedHwkRSz-QJGXhO9EFtx2Re_7RObCiTHkGTXfHqsYAVJX-oo5Nu1gdFYs4aztSSXUr4UJM2wbeK0R0O3zo-g7KTukEDz-2nea_vD39VbDHCA1eBMyOy1EDtSoW3QAx85pylFt7SRGtAT7Btz6G5N3nI6isNhV3GoyO5B9zXnGC2dbrsbPjzS9YhGT80uzjgub8l2l8-H7Y0YN0KP3qv_JteppjxLVaMpsAmsJ-0P_R_8sR85jHSEfFDu4f__rggwPfjqz58gDM58PSSm7nj0NWA=s660-w660-h529-no)

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
