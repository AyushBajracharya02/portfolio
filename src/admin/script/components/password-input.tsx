import { Input } from "@/components/ui/input";
import { Eye, EyeOff } from "lucide-react";
import React, { useState } from "react";

export function PasswordInput({ ...props }: React.ComponentProps<"input">) {
   const [password, setPassword] = useState(true);
   return (
      <div className="relative">
         <Input {...props} type={password ? "password" : "text"} />
         <button
            onClick={() => setPassword((prev) => !prev)}
            type="button"
            className="absolute right-3 top-1/2 -translate-y-1/2"
         >
            {password ? <EyeOff size={16} /> : <Eye size={16} />}
         </button>
      </div>
   );
}
