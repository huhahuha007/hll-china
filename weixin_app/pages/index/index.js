Page({
     data:{
       imgUrls:[
         '/image/b1.jpg',
         '/image/b2.jpg',
         '/image/b3.jpg',
         '/image/b4.jpg',
         '/image/b5.jpg',
         '/image/b6.jpg'
       ],
       actionSheetHidden: true,
       actionSheetItems: [
         { bindtap: 'Menu1', txt: '呼叫' },
         { bindtap: 'Menu2', txt: '取消' }
       ],
       menu: '',
       indicatorDots: false,
       autoplay: false,
       interval: 3000,
       duration: 800,
     },
     actionSheetTap: function () {
       this.setData({
         actionSheetHidden: !this.data.actionSheetHidden
        
       })
     },
     actionSheetbindchange: function () {
       this.setData({
         actionSheetHidden: !this.data.actionSheetHidden
       })
     },
     bindMenu1: function () {
       this.setData({
         menu: 1,
         actionSheetHidden: !this.data.actionSheetHidden
       })
       wx.makePhoneCall({
         phoneNumber: '1234567890', 
         success: function () {
           console.log("拨打电话成功！")
         },
         fail: function () {
           console.log("拨打电话失败！")
         }
       })
     },
     bindMenu2: function () {
       this.setData({
         menu: 2,
         actionSheetHidden: !this.data.actionSheetHidden
       })
     }
})